<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'area' => 'required',
            'genre' => 'required',
            'content' => 'required',
            'image' => 'required',
            'menu' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名を入力してください',
            'genre.required' => 'ジャンルを選択してください',
            'area.required' => 'エリアを選択してください',
            'content.required' => '店舗の詳細を入力してください',
            'image.required' => '画像を選択してください',
            'menu.required' => 'メニューを入力してください',
            'price.required' => '金額を入力してください'
        ];
    }
}