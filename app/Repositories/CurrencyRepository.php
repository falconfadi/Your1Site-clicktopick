<?php

namespace App\Repositories;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class CurrencyRepository {

    public function add(Request $request)
    {
        $currency = new Currency(populateModelData($request, Currency::class));
        $currency->save();
    }

    public function update(Request $request, Currency $currency)
    {
        $currency->update(populateModelData($request, Currency::class));
        $currency->save();
    }

    public function delete(Currency $currency)
    {
        $currency->delete();
    }

    public function getCurrencies(Request $request, $isAdmin = false): LengthAwarePaginator
    {
        $limit = $request->get('limit') ? : 10 ;
        if($limit > 30 ) $limit =30 ;

        $currencies = Currency::query();
        $mainCurrency = getMainCurrency();

        try {
            DB::beginTransaction();
            if(($isAdmin && (Carbon::now()->diffInHours($mainCurrency->updated_at) > 3)) || $mainCurrency->exchange_rate == null || $request->has('request_rates'))
                foreach ($currencies as $currency){
                    $currency->exchange_rate = convertCurrency($mainCurrency->code, $currency->code);
                    $currency->save();
                }
        }catch (Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());
            goto filters;
        }
        DB::commit();


        filters:
        if ($request->query('status') != null){
            $currencies->where('is_active' , $request->query('status'));
        }

        if ($search = $request->get('search')) {
            $tokens = convertToSeparatedTokens($search);

            $currencies->whereHas('translations', function ($query) use ($tokens, $request) {
                $query
                    ->whereRaw("MATCH(name) AGAINST(? IN BOOLEAN MODE)", $tokens);
            });
        }
        return $currencies->paginate($limit);
    }

}
