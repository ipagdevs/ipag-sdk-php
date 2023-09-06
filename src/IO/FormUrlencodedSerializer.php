<?php

namespace Ipag\Sdk\IO;

class FormUrlencodedSerializer implements SerializerInterface
{
    public function __construct()
    {
    }

    public function serialize(array $data): string
    {
        $output = '';

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $key = $key . '[]';

                foreach ($value as $v) {
                    $output .= $key . '=' . urlencode($v) . '&';
                }
            } else {
                $output .= $key . '=' . urlencode($value) . '&';
            }
        }

        return rtrim($output, '&');
    }

    public function unserialize(string $data): array
    {
        $pieces = explode('&', $data);
        $output = [];

        foreach ($pieces as $piece) {
            [$key, $value] = explode('=', $piece);
            $output[$key] = urldecode($value);
        }

        return $output;
    }

    public function getContentType(): string
    {
        return 'application/x-www-form-urlencoded';
    }
}
