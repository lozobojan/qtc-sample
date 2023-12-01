<?php

namespace App\Enums;

enum ClientType: string {
    case PERSON = 'Person';
    case COMPANY = 'Company';

    public static function getEnums() {
        return [
          self::PERSON->value,
          self::COMPANY->value,
        ];
    }
}
