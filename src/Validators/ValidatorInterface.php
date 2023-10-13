<?php
/**
 * 文件描述
 *
 * @author 傅增耀
 * @time 2023-10-13 14:20:12
 */

namespace Nelsonkti\Validation\Validators;

use Nelsonkti\Validation\Validation;

interface ValidatorInterface
{
    /**
     * 调用某个方法前执行验证器
     *
     * @param string $when 待调用的方法
     * @param array $data 待验证的数据
     * @param bool $throwError 是否抛出错误
     * @return mixed
     */
    public function validate(string $when, array $data, bool $throwError = true);

    public function getValidationData(): array;

    public function getValidator(): Validation;
}
