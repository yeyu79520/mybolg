<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'key' =>'required'
        ];
    }


    public function messages(){
        return  [
            'title.required'   => ' 分类标题必须填写！',
            'key.required'   => ' 关键字要有哦亲！',
            'title.integer'    => '分类名称太短',
        ];
    }
}
