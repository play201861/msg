<?php

namespace App\Http\Requests;

use App\Message;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    /**
     * 留言的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|min:6|max:255',
            'reply_id' => function ($attribute, $value, $fail) {
                if ($value != 0 and !Message::find($value)) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }
        ];
    }
}
