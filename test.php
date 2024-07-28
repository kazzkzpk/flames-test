$window = new Vrzno;
$window->Flames->Internal->evalBase64 = function (string $base64 = null) use ($window) {
    try {
        $data = eval(base64_decode($base64));
        $window->Flames->Internal->onSuccessListener($data);
        return $data;
    } catch(\Exception|\Error $e) {
        $window->Flames->Internal->onErrorListener(
            $e->getMessage(),
            $e->getLine(),
            $e->getFile(),
            $e->getCode(),
            $e->getTraceAsString(),
            serialize($e->getTrace())
        );
    }
    return $window->Error;
};