<?php

namespace Nelsonkti\Validation\Validators;

use Nelsonkti\Validation\Validation;
use Nelsonkti\Validation\ValidationException;
use Nelsonkti\Validation\Validator;

abstract class AbstractValidator implements ValidatorInterface
{
    use ValidatorTrait;

    public static function create(): ValidatorInterface
    {
        return new static();
    }

    /**
     * 调用某个方法前执行验证器
     *
     * 此方法不允许重载
     *
     * @param string $when 待调用的方法
     * @param array $data 待验证的数据
     * @param bool $throwError 是否抛出错误
     * @return \common\validation\AbstractValidation
     */
    public final function validate(string $when, array $data, bool $throwError = true)
    {
        // 保留待验证的数据
        $this->validationData = $data;

        // 验证并保留已验证过的数据
        $this->validator = $this->validator($when, $data);

        $this->validator->validate();

        $this->throwError($throwError);

        return $this;
    }

    public function getValidationData(): array
    {
        return $this->validationData;
    }

    public function getValidator(): Validation
    {
        return $this->validator;
    }
}
