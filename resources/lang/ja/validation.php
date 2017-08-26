<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted" => ":attribute：確認されていません。",
    "active_url" => ":attribute：無効なURLです。",
    "after" => ":attribute：:dateより後の日付でなければなりません。",
    "after_or_equal" => "The :attribute must be a date after or equal to :date.",
    "alpha" => ":attribute：アルファベット以外使用できません。",
    "alpha_dash" => ":attribute：アルファベット、数字、ハイフン、アンダーバー以外使用できません。",
    "alpha_num" => ":attribute：アルファベット、数字以外使用できません。",
    "array" => ":attribute：配列以外使用できません。",
    "before" => ":attribute：:dateより前の日付でなければなりません。",
    "before_or_equal" => "The :attribute must be a date before or equal to :date.",
    "between" => [
        "numeric" => ":attribute：:min～:maxの範囲である必要があります。",
        "file" => ":attribute：ファイルサイズは:min～:maxキロバイトの範囲である必要があります。",
        "string" => ":attribute：長さは:min～:max文字の範囲である必要があります。",
        "array"   => "The :attribute must have between :min and :max items.",
    ],
    "boolean" => "The :attribute field must be true or false.",
    "confirmed" => ":attribute：確認欄と一致しませんでした。",
    "date" => ":attribute：正しい日付ではありません。",
    "date_format" => ":attribute：:format形式ではありません。",
    "different" => ":attribute：:otherと異なる必要があります。",
    "digits" => ":attribute：:digits桁である必要があります。",
    "digits_between" => ":attribute：:min～:max桁の範囲である必要があります。",
    "dimensions" => "The :attribute has invalid image dimensions.",
    "distinct" => "The :attribute field has a duplicate value.",
    "email" => ":attribute：正しいメールアドレスではありません。",
    "exists" => ":attribute：存在しませんでした。",
    "file" => "The :attribute must be a file.",
    "filled" => "The :attribute field must have a value.",
    "image" => ":attribute：画像ファイルである必要があります。",
    "in" => ":attribute：正しくありません。",
    "in_array" => ":attribute：:otherに存在していません。",
    "integer" => ":attribute：整数である必要があります。",
    "ip" => ":attribute：正しいIPアドレスではありません。",
    "ipv4" => "The :attribute must be a valid IPv4 address.",
    "ipv6" => "The :attribute must be a valid IPv6 address.",
    "json" => ":attribute：JSON形式である必要があります。",
    "max" => [
        "numeric" => ":attribute：:max以下である必要があります。",
        "file" => ":attribute：ファイルサイズは:maxキロバイト以下である必要があります。",
        "string" => ":attribute：:max文字以内で入力してください。",
        "array"   => "The :attribute may not have more than :max items.",
    ],
    "mimes" => ":attribute：ファイル形式が正しくありません。",
    "mimetypes" => ":attribute：ファイル形式が:valuesである必要があります。",
    "min" => [
        "numeric" => ":attribute：:min以上である必要があります。",
        "file" => ":attribute：ファイルサイズは:minキロバイト以上である必要があります。",
        "string" => ":attribute：:min文字以上で入力してください。",
        "array"   => "The :attribute must have at least :min items.",
    ],
    "not_in" => ":attribute：正しくありません。",
    "numeric" => ":attribute：数値である必要があります。",
    "present" => ":attribute：存在している必要があります。",
    "regex" => ":attribute：形式が正しくありません。",
    "required" => ":attribute：必須です。",
    "required_if" => ":attribute：:attributeを指定してください。",
    "required_unless" => ":attribute：:otherが:valuesでない場合、:attributeは必須です。",
    "required_with" => ":attribute：:valuesが指定されている場合、:attributeは必須です。",
    "required_with_all" => ":attribute：:valuesが指定されている場合、:attributeは必須です。",
    "required_without" => ":attribute：:valuesが指定されていない場合、:attributeは必須です。",
    "required_without_all" => ":attribute：:valuesが指定されていない場合、:attributeは必須です。",
    "same" => ":attribute：:attributeと:otherが一致しません。",
    "size" => [
        "numeric" => ":attribute：:sizeである必要があります。",
        "file" => ":attribute：ファイルサイズは:sizeキロバイトである必要があります。",
        "string" => ":attribute：長さは:size文字である必要があります。",
        "array"   => "The :attribute must contain :size items.",
    ],
    "string" => ":attribute：文字列にしてください。",
    "timezone" => ":attribute：正しいタイムゾーンを指定してください。",
    "unique" => ":attribute：すでに使われています。",
    "uploaded" => ":attribute：アップロードに失敗しました。",
    "url" => ":attribute：正しいURL形式ではありません。",

    // CustomValidator用メッセージ


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'ニックネーム',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],

];
