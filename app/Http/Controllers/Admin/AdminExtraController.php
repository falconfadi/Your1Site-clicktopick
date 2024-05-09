<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminExtraController extends Controller
{
    public $resource = 'admin';

    public function VendorsAutoComplete(Request $request): JsonResponse
    {

        if ($request->has('role'))
            $vendors = Admin::role($request->get('role'));
        else
            $vendors = Admin::role(['retail']);

        if ($request->has('search')){
            $vendors->where(function($query) use ($request){
                $search = $request->get('search');
                $tokens = convertToSeparatedTokens($search);
                $query
                    ->whereRaw("MATCH(name, email, username) AGAINST(? IN BOOLEAN MODE)", $tokens)
                    ->orWhereHas('translations', function ($query) use ($tokens, $request) {
                        $query
                            ->whereRaw("MATCH(company_name, about) AGAINST(? IN BOOLEAN MODE)", $tokens);
                    });
            });
        }

        $models =  $vendors
            ->take(5)
            ->get()->map(function ($result){
                return array(
                    'id' => $result->id,
                    'text' => $result->name . ' ('. ($result->company_name ?? $result->username) .') ('.$result->email.')',
                );
            });

        return response()->json([
            'results' => $models
        ]);
    }


}
