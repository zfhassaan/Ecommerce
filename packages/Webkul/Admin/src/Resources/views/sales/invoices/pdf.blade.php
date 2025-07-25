<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ core()->getCurrentLocale()->direction }}"
>
    <head>
        <!-- meta tags -->
        <meta
            http-equiv="Cache-control"
            content="no-cache"
        >

        <meta
            http-equiv="Content-Type"
            content="text/html; charset=utf-8"
        />

        @php
            $fontPath = [];

            // Get the default locale code.
            $getLocale = app()->getLocale();

            // Get the current currency code.
            $currencyCode = core()->getBaseCurrencyCode();

            if ($getLocale == 'en' && $currencyCode == 'INR') {
                $fontFamily = [
                    'regular' => 'DejaVu Sans',
                    'bold'    => 'DejaVu Sans',
                ];
            }  else {
                $fontFamily = [
                    'regular' => 'Arial, sans-serif',
                    'bold'    => 'Arial, sans-serif',
                ];
            }


            if (in_array($getLocale, ['ar', 'he', 'fa', 'tr', 'ru', 'uk'])) {
                $fontFamily = [
                    'regular' => 'DejaVu Sans',
                    'bold'    => 'DejaVu Sans',
                ];
            } elseif ($getLocale == 'zh_CN') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansSC-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansSC-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans SC',
                    'bold'    => 'Noto Sans SC Bold',
                ];
            } elseif ($getLocale == 'ja') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansJP-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansJP-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans JP',
                    'bold'    => 'Noto Sans JP Bold',
                ];
            } elseif ($getLocale == 'hi_IN') {
                $fontPath = [
                    'regular' => asset('fonts/Hind-Regular.ttf'),
                    'bold'    => asset('fonts/Hind-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Hind',
                    'bold'    => 'Hind Bold',
                ];
            } elseif ($getLocale == 'bn') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansBengali-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansBengali-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans Bengali',
                    'bold'    => 'Noto Sans Bengali Bold',
                ];
            } elseif ($getLocale == 'sin') {
                $fontPath = [
                    'regular' => asset('fonts/NotoSansSinhala-Regular.ttf'),
                    'bold'    => asset('fonts/NotoSansSinhala-Bold.ttf'),
                ];

                $fontFamily = [
                    'regular' => 'Noto Sans Sinhala',
                    'bold'    => 'Noto Sans Sinhala Bold',
                ];
            }
        @endphp

        <!-- lang supports inclusion -->
        <style type="text/css">
            @if (! empty($fontPath['regular']))
                @font-face {
                    src: url({{ $fontPath['regular'] }}) format('truetype');
                    font-family: {{ $fontFamily['regular'] }};
                }
            @endif

            @if (! empty($fontPath['bold']))
                @font-face {
                    src: url({{ $fontPath['bold'] }}) format('truetype');
                    font-family: {{ $fontFamily['bold'] }};
                    font-style: bold;
                }
            @endif

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: {{ $fontFamily['regular'] }};
            }

            body {
                font-size: 10px;
                color: #091341;
                font-family: "{{ $fontFamily['regular'] }}";
            }

            b, th {
                font-family: "{{ $fontFamily['bold'] }}";
            }

            .page-content {
                padding: 12px;
            }

            .page-header {
                border-bottom: 1px solid #E9EFFC;
                text-align: center;
                font-size: 24px;
                text-transform: uppercase;
                color: #000DBB;
                padding: 24px 0;
                margin: 0;
            }

            .logo-container {
                position: absolute;
                top: 20px;
                left: 20px;
            }

            .logo-container.rtl {
                left: auto;
                right: 20px;
            }

            .logo-container img {
                max-width: 100%;
                height: auto;
            }

            .page-header b {
                display: inline-block;
                vertical-align: middle;
            }

            .small-text {
                font-size: 7px;
            }

            table {
                width: 100%;
                border-spacing: 1px 0;
                border-collapse: separate;
                margin-bottom: 16px;
            }

            table thead th {
                background-color: #E9EFFC;
                color: #000DBB;
                padding: 6px 18px;
                text-align: left;
            }

            table.rtl thead tr th {
                text-align: right;
            }

            table tbody td {
                padding: 9px 18px;
                border-bottom: 1px solid #E9EFFC;
                text-align: left;
                vertical-align: top;
            }

            table.rtl tbody tr td {
                text-align: right;
            }

            .summary {
                width: 100%;
                display: inline-block;
            }

            .summary table {
                float: right;
                width: 250px;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: #E9EFFC;
                white-space: nowrap;
            }

            .summary table.rtl {
                width: 280px;
            }

            .summary table.rtl {
                margin-right: 480px;
            }

            .summary table td {
                padding: 5px 10px;
            }

            .summary table td:nth-child(2) {
                text-align: center;
            }

            .summary table td:nth-child(3) {
                text-align: right;
            }
        </style>
    </head>

    <body dir="{{ core()->getCurrentLocale()->direction }}">
        <div class="logo-container {{ core()->getCurrentLocale()->direction }}">
            @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.logo'))
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(Storage::url(core()->getConfigData('sales.invoice_settings.pdf_print_outs.logo')))) }}"/>
            @else
                <img width="40" style="margin-let: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOgAAADoCAYAAADlqah4AABW0UlEQVR4nOy9ebAe13Un9jsfAJJYSIIgFg5XUKS4i6RMbSS1gLIkO7Y1kZWRNLZHY02qkqpJpcpyZatKqmI7VUnNHzM1caqSyh+pRLYnk5G8SJbkOFpIglqoXSYlLqIok48UOSIWkiAJAiBA9El93X3v/Z1zT3/v4QF4AN7rwwK/7/XXffv27fu755zfOffe1ThJsn37ju1Hj2KHCm4VwRUCuTX9dLLuOcooSyD7AMwpdJ8qHhTFziOr8MBzczvnTsbN5EQWdumlO3ZggvdMRD4xAnGUFSYPNKr36VF86tlndz5wogo9IQC97LIdn8AEvyuQHSeivJUqIgJVNd+nn1NJx6Nr/O/+2HxljHLC5QFt9I9//vOdnzrego4LoFNgykT+YNSWJ0ZigE6Bhfw5fxnlPPvdlocRuEshc9roHx0PUBcF0Eu277h1ovjXo8ZcnCRgANqDr2jLCCzpdA+2WecAMaglfOMFqPPVZZRFydxh0bsW46euOtYLLt++45MTlc8KZNSai5AOnIvv+B5g0/Jmadc0GAhdyGVEgD7eOo5SycZVkE+ee/52vPzS3H3HcuGCNejG7Ts2nqv47Kg1j01maaRY6wlp1tq8LeVY/7Q7XmvN6B6+DpFJ7OuCAc09yrGJQnceEfyzhWrTBQH0ou07tp+lcu/oax6/ROYqg6CI9q+nfNbEkS/Pk0JRmchg5jrNZxqPckJlwSbvZL4TRnAuXpL5CQcaCyyPBCUTNAHKnjv9TISPvc6zt1xefR8EGhSwf0cm9SjHLS2mptia78SZAB3BuXipTcshlcRg0xAArDVL+WIAG13Dv/P17GcWcznWovWxOpwzyqJkQSAdbOERnCdLNDd7AQWbs/PHQL1fy/5nvot2ZTKo5vchpT+ngchkwPSu6zHKccncy6Jv3je3c1/046AGXaP4v0ZwLkzm0yRssibNVccjS0dn8BUASP5M4Es/JS2Yzi/XaD4XA8kMXqbgLNdiwDxGVd4oi5bt5yo+O/RjGGa5fPt7/0CAT5zUai1TqX22ArhCzhTSx5uNqMAj5rP2F72mLddOJjEIveazIRh/b6UBpC6P/exRFicC2X7++dtfeumluW/XvznpTdsnl6x2y0Q4UydJ7H/WoCzAVXMth1mi8qIQTvlezOhjfQY4oFpzOSaTOOFilMXJUdE3Pztn83grE7f3O0c5RmFwWnJFs2+X/vadOJmoCLKMELCy9rq6Hul6Hgg609fWrVwuZDpHZcGV5cMwMtMUHmVhMlH8a3/MmLhtbm03E2WUGTKUlWPNQw2zeFxJ5q+u4zOgZ3f4OEtIqs9Yq/lrohTDyNQe+nvWtaMsRKam7nnnbX/q5ZfnshY1GrRPfB/lGIV9QOtvzp6NwhqpP9KXN5vQ8X9b7a0mhMImqwWv5n+FGAL5yPZ5ig8qFeNsBykMPu8o84vHYAZoO2VsZG0XJNz5itYzZ1QxSh+HhAuz2DItqAroo7KVzOFk1hbAscnMWtJrWvsMljlmszn9G2fCnDTZ3mOxlQxQmcjvnbIqnUHSZddEzKXOyK2FCZckdtUTQ5Fm5CQGrkO6XwJx+u6B1oFVTQZTNGhwvWtyazhJwtbJZyHJaOouRib43fS1bb1Ltu+4dZXK353SSp0h0vU3H6aAmzZWzrcdWZy288nukTYa8h+PTXN5kxvwdbahmiFcRUkStrwxj/dESHNU73rmmZ07Ww26qhljnguRKBwCsJnaDCQMpPPUXO/T8ehM+idOg1lAeDaVtSCztEMJC3V+L/uvNVHk68v3i9IFR1mkTLAD2cQVec+prs+ZKJxMXkxNm1hQf85KSqjjqAXsnDHUGNO3AN0n2multSNfM9L4CahN49WhhGGjoVzeURYnE5HWzJUxMWFxwhlCrBVtEvvwdfw3S9F0Ophon+6xdttWrF6/FmvO3dAeP/LKfhzctQevv3pghvlsExii3zCQ8FCSFGaZ2OKeNbrPKAuRieiVq9ccxa3zTzobJYmd5cF+2OwOmIBZaxkGdndc3eyWdPzCW27EpptvwKZbbsR5V23H6vXrQhJmCtC9DzyE3fd/D88/+DAO7d4b3DNmb9P9LHMrbrCpByM/R9Uz1SM4j12OHsWO1SIYV0iYR+JJ1bYzc0ik5LD2Z2o8K8T7ghxOYc136Qfeg0s+cFcL0PpetUyBe9Gdb8O2O97anvfMl3fi8T/9TKtda4JHwJPBrdas0/2oVYJnYXZ6lOOVdk3pK664617FCNJZ4v1Cjl/WnRjV1C/Ap+vZY/57kikgr/74R9rPSDz7Ol/20LNToP7ZZ3DguT30bJFZazU6tQRdo9V11twfGaLjFsVfrzp/45WfBHDRqa7L6ShDKX2gON+w6VaHTqIsmzoW2v27/p9/Ajf93n+KdRdtXVD9JpNJPsZMK58zNYsv+cAONEcOY9+jj7vza0BF5nMx51GtFsHxWBg/d/ARRpklgnOmAP0XAM451XU5HcWmx6GaHzkchI/BGYVo/N9T8/St/9N/h4vvunNRdfaaFI6ZnaxZg61vfXNboRcefJjO0wEGWjNrO1+usdegIzCPW/YlgI4yQyRYsWC29iwd3mYdeT/NarjV69fiHf/qf8AF119jSvOacGH1VZcmaMG06eYbsO6iLdj9re9Vz4kAtL5MD8CIMCq/Lbjqo1jZOAXoH57qWpyuEnUsCSdZ+zzbhWQE1Wbt7X/8P+L8q68M71nKnw1WD0Suobrfz7vqyra8F3/0SA6fxGZpvfhZOc7mrbh6xMuxjLJwGQMsA+JDBcW0jcHnY5beHOxL6v6q8mUVV/2Tj+D8q9+wgHrVebHznS/9A0TnXvNPP4YrPvRruV4+VRGDGtAmXjCbDXAYCvnvEaTHLiNAByR1qJjYiU1by4Aya2uzbuiK9typufnGj39k+uuC7hPd81iF0wyv+d2P4Zytm6m+NlTCwOV0QJstpC4WXA9mY/jl2GUE6IDUqWo2GYFNugJmT8r4VD1bfgLym/7L/6wFZxKbFzuU6H58vZ1jqavXr8P1//yfmRxhuBXlfdhFaIX7pC3jSd/HVc0VLyNAnUQZMawlOGsoAmIpx88M0ayR8/mN4uL3vxvnbNvS31Pbft6C1cVLPSk1mUwWRBzNB+RUxkV3vg0X3nJTmKvbNH79XJ96aMvzrO4I0sXLCFAndYzShlZSR11oOepmrBggC9pEBEmgZBJoRnrc9HjTNHV5ASCPhf294jd/bTqcBPHN8jc/C5wmtc9bb3c4yrHLCNB5xPpdtahbVgRGo8yOBW68+Xqcs20zGpqNksuEBYKtk2VLa/bU1m8hMj3vwltuxKoNa42/CUpV1Gr6mU8BFHByPbfHsQwUoxQZATqPLKR/+9xYJkqsH8flKi55f5nlVzw4dvSGM+ZmsbnzgXII9Gs2rMdFd7y91aL2XB/m8fe0S64A1ve295lZtVGcjADtZeHB9eKjlhCCOvYSZomR7u9+DmfnZGLtti24+APvLr+leZ19GUrzPvNnQCTV90eYnzvrWVnahHzU/nR5tjhHN7HVNtEBKMut2FDTKAuTEaALlDgxwWcL1ckHhvWdduD+vwtuub4voUNx0Z49OLTAUdN5ipBFjrKaImIpAqYH9wU338C/msQF65NHEwCs/8ltASAkmEaZLSNAe6k7OEIyyAfzixabVSbpxf7Ylb/zYbq2seWjIMJoTRDL62Qo22g+09f7sOsu2hqCXc0KDlGb2FzlISZ39EePTUaAksT9Jkoi14rF9P5lFbdsyjVb7ritNXFhAN4QgDWHXMB/J/AFJq59jvkJrVmabN22bQPXz24nLz5WWv6NWnShMgKUpCY0fGqeVhrAM56oSKPe76Tr/sH731X8TBfzhJRQTrsekJSub3zOYLnOqOMPmbiztdj8Gtq3RclRLud4v9PHS0eZX0aAzpDI7I00wLB524Gz8ym74+ds24zNt9/W+ZVq/cqmJ4MySDkTiTxSZVCG2nwYiB5oXqN6QGuQuBCtkxtJSuqI2mnUoguTEaChDCcjxEF8Zm5d4gD/p4or/8lv2vtIAaevAYjVLVRR0q5kEpNf6kE1pFV1YBpaBpv6pA2tyLFaW0YJ+erazbbfKLNlBChJSY73BEttosVZMmrCC92VYsrf+Kbrep+s6cuJNHIPyETK5BKVZo0AJrtJUYVHMACE6bG0AkMkB3btHri2XitX3bIrsWbUatX6UYMuTFYsQKWaTA2z9iwiFtYtEMa/9aXWhBGBdtv73omzt23OTK33QafHG8foInNF1sRVx6ZmGDt2eUimGjiSV56Yy+UM+a92kPCi1fl+Kc7691GGZMUCNInNgKnNPp88D0RZMnU+aim/MLPbfvmdXXKQiNMqFlzZF53+Jj1oqR75WnEaK/u6kUa2MgSQfY8/GVzDsVeYAasux2pT6w+Xa0YNujBZfaorcKokTjywv9kYZ73sJhwxMwSE6fFztm3GxpuvbfNuJTG7ZDIqmnadRXFZONNj6XtyA3vqqf9NCyaFnkcibT+cXZRk1ze/Q60ihqjiZ4rbsX72VPcTOVVuJcmKBWiSpM0wkJETnV8IEwvgomH9VYorfuc/LH/12g8ptyjw65AwJ3Dpuf0BmRT2Nmni9Gt/fCJSyKMFpNgdfmU/XvjxI1Tr3sTu2VilpTUnE6lWjRceIGDDLOkZRfjYCNT5ZEUD1HesyPxSMhnFrZQw/drtXaLhtKt03ur163Dh7b/U+aPge1lQtZ89SSW2Al2HhhJYm5i86ksUsYau5jsNy55vfa/dPkJkki6qfFFVO8NHg6VOCgjL3efbzmKUWFa8DwqAEt/Zb6pjfep2//KrsptAPCXVb77jl7Bq3doculB4/y5pzOJDJioIPWB9Li4PHA1trtSBvcmTrHMMVmebt9PjT/zlF/uyKbYarDIf/R0xuOKWLU1J9WO638JlRWtQ1nIYCAFItbdIrU35c3qcGdLp9Zf/9j8s10a+WCKoss9XJ6R3WBUaN4oPymb6kIbSVOcBTbrv8Sfw8t8/SfWWHLrxbVL+XlhmklQbTI1+6EJlRWpQEbgFwfIv/e+xtphNdEQdWXHeTdfgrK0XlqAKZQb5pHcFZxA1pEdJm/rrBXnCt5LuRd5rhaCaNGnA8s791RfNMw6RaDZdz5ZRmO354qKj9lyorEiAqqJaayh9DmlGhFqk+/QmG3/f9r4787VK91JCjqoFbqJri9bR3t9tCLAwyfVcIaVEiDpdsJjK6XkO7d6Ln3/pnvoZHY4is9bHOzkMwznJHsyjLExWJEABq0E9Q0ln9edKNb+zE29W2rjnOds2Y8sv394BRgKQwmpSa05r4Ova+7AiVOPHkpbtNbKIPQv0/Hsf+DG1S209CK1AOMQ4A0OzXGDaaHQ9j01WFEDrbBhYkoa1EflKkQb1MdHInDv/Tdf6m1EIpdbOWdMIyBxGBlQCW6mg06bM8tKsGM2aF87M7s55/E8/7VISxaXvwbUJVQD2ewxe2+4jQbRwWTEATUSKuFXiI/8S8MRQ3NlM2UHHu+S3ft35mt39GwJpJngERutlMAqxtIAxVdvvfdK8MW8p7S+5hJrtehRtrornH3wIB57bXS3z6cWasxq0Wc8oNwq/hlEto4m7UFkxAFVV53sWDREnKKgLEWAguE5gIKZ30ztuxdktOZTdvny/XH4fEsmDgXQTu2HOTRUmk5e0H+XPVQNKDh2Bta2aOj/z5XtdO9nHgvMlNUhc4GvFZVaUgbHWtqPMLysGoLVE2hEm66XWmjw5u2iRKP439T2R4JH9PyZ1xJBDAJuwbkEw2EXJFM5PJe3b9OxvKqc/udO07LYKcOAXu/DMl+6tWiYCUxrUROr2m2Wy+vBU3d6jzJIVBVAOksdkSLR0JszUMJiwS3yPs7Zuwsa332ySCzjmqX2ZjQMvmEhyK8yrI6BAutASNTZMYk3eskLg9GGe+fLOoP5SWaDeN0/Elb1XzeDmBx415qJlRQCU09C8b5lE3dKZkXnrkwc8MZR+n/qeuVwCSEk6KCyqiferooqXss8JrUzV6px2MHH1S5ije03P//c9QP28Vx4YMKBRbVsMZyeNcnyy7AEaa7t6KpSNO0bbFpROX88jVfJxFefe9EbL7Kq9vpA2IHNWywrz0QASJBdYzeYZ5sCXJVP42S/fh4O79ri2oudDvWK9z1hSt9MZn+sHwdGqXZwse4AmsUCzplk6XnJw1V1TxObiFq2Yjm/+5Xfg7K2bnJlqJ2j7UAuXk9fIJQ2lKcfWMbSc9tcmMqgFOzgxgf1YBZ4NzNuIIALqUItti+EEBh+eGeXYZdkDtDZBC6sYaQQfB/Uda4jgSMe3vPcd5VjTpOw8C8Yq5c95lT2pA/LpmAU2xBJpYIHhaMt9OIlBuiVNXnjw4f4ZrXnr62jbbpYatGC1RNqoQRcryx6gnGrGncQztNEsC3YZFyJnb7sQ62+6ugdQY+KQcNqQJScUkAnMhJF6n9I/g4DOI5C7eyfC6ok/+4v+YMFcJs8gefCKc5KlSjwohQ35976MURYqyx6gs+KbtrOHV1egNul+as/9Bx/71XKYZnC0YFVL8nD4RIgkqjKI3HOIOOIJyfdtLJAttM01LzxYJmUXAKPSyr5Nar9ytitQA3wMsRyrLHuAJkkdviYwionoNVT6PQn7VWmfFfQdb9X6tdj4jlucBlNjbjJZ6xPe1e3FAriQCs1uoQcq5q0QA+uqzoTUL5gckvJc5SGLpozmxbJYgijKxBp9z+OVFT0ftBNeEd2vjGAZSqNxnXbb+PabsWr9Of1vqeSkFbvO3vTmrYBT5nhZEuR7Kqu2tg6TYraSJk3VLBp2Yo6niEkKbz712b/lJ88aGCgmrmmdAHz83ECd/qdaL//C/v8oC5dlrUHr0dsfsEuYgMzY/q98zJznTNupXPSxX8k+HnoftLF0TUm+R2OAAT7LhE/UlUCRSk4P9NQQ+abpyung8OoTT2H/E0/1zyFmkBGKgUbJGkWrcvtOBsMrtXk8mreLkWUN0GRicXJ8RA4BMHHRqCNJ3ntE4dfp2XDT1S1BZI1aWN+PZqsYPUxLbCIkhJhhsaEUkzro627mgXby1F/9bRBKkQqs/MylLW272bxkMUvClFAUchuP5NDiZFkDlM2suoOUzlVrDM48ihlULn/TXW+tQh/emiu/lb/JwyzXBeazEtHE+pK9zqZpSh4ueJWF7u+p3/ncV7/u6i8mOYF+MdlXCLd0sMCL4sLezB3l2GVZ+qAiQJSQExNE5Tdg/vjd1BTk1d/P2roJm9771gKqIY4pg6GhktCzMt1i1ZNsP9O6tqBlPqWsp1uKFojmJQJLmCaV3Z/54oOP2EkAC4hNqnJihoSEDyclWFBzu4/m7WJlmWrQuidZP1JMYoKf54gBn6kjeuzWDBtuvMrGBTkWydpQNc/rFLdmT/FbnbZW64WCSlZVe0dvDjtN/NS//VwuW5x5XxNDTPTUbRJlDpV6o0oRHLG5eFlWGrT2ITVkDmfH9+JrkrY1K+spsO1jH+iTElgjih0MmKVNbG7LuUzy/Tv2lTSSX40dml3Nth4Tu4C2T8jgttj3o0dx8Lnd3T2chpXM9JZ7pvqwG8Bsrgdp3O5R245yrLKsNKj3E3k9HZvS5gmPdH4uyZThaJ2cKXTu227Emq0XmClhWcclk9azoqzp8mwTgZ+hYsOZtsNnE96xtzxTJd9LgOe+8o2BvFlie3sAluazlkXOzegHBZ/AwYNFIedGYuh4ZVkB1OfOxqO3Ona3KiVrDO7U0VqyF9z1lv4+BWwK2JUMAJdTW0xS5aQGdXCjLfG9ZuI4rRKoLa678g8+twfPffUbQbqdTboAm7wzgCVSLz7NM4YkWwWj9jwRsqxMXKb17YgPlxWj7rhNbUsAS+emD/YHz9q6Cee97UZjMkrPvLQrHDTAZMLmdNqXRAhcJS0hsTaa6pRJIrjkBSajlExo3ucFeXnqXV/9BjVQ4J5rN0wPYckTP7aN1f1m59GO+Dx+WXYatP9W/cbBfzi/SRW0okJVaneeW2Bsy0ffZ/LGFRT1VLs4WDpDXb4rXCikmK9NHXgxg4a9V6lBraF3ffWbRSOKfzIhXzZmYZkN1zwo+MKiGHIcmhnl2GRZaFAfPtFw92uQ9lKTqKDKQI1II5gUwOnH+hveUDo2sgLszWG4NLw6BSmTMmkqipTQh+NIM+nEv5nc20TyCGt7YPdX7sehXXvz+by1BIAq4aL4kUPtq8YKsStVKDhtcjRvT4wsEw1aTC0bHPdMoyc77PWRZsjf6PyNO27Dmm0X2MSCBMZ23zH2KWtmE1Y35jioUiICVKswDNRnKsGUkYHam8a77/5mfnatFh9j4XaK58BGifOsvdn3HOXEybIAqDfJOL0vjfLdbl+ogaL+O4M1HS/HpuVtvOu2Kj0vgxS1WctwFFruRA3pA8vCMq/b+7WczmcpJeQsogTWQ7v2YN+PflIyhWDneA5tRVi3R9SufXWJGR815smRZQFQG5OrTSy/hpAVDRPB8/WOeFqz5QKsu/FKuppXRnDaMpuhyARQwz6j02qqmhMhlMsBKJFBHZtb6stlPf1/fz4ztQL2r+OGiOZv+rYdih8X9jcsepTjkDPaB82mWzB6W9Ji/p5TZxVlm7HHUnePzR95L6W39SvVw2YHmXr0n43SaCj935OJGQhMRlPvt6rzl9P1nAYoIs4wV7z048dsO3gK1xFqrCEjssgScMWJHdK4o5wYOaM1qNWSse/UfzP+qY3b+fmLVivwb6vXr8WGt91AU7yQY4/t9LJ+yctsgrpVEzQRPkggK2mDJVZqmV1wrLRpXIpf0agq5djur3wTr+1+wbRFBr/G5q23HizYasCOsjRyRgOURdX7TPP3JpOOV21jwNsDdp8b3noDJuvO7o81FiAg5ph8SRAplYCsqlXKu2q9zMgU8AIKkYgtC5yHS3u37Lnn20UTumdIPiqTPmw1xKsoqElQ4ONwg+MYWjmxsmwAWqZO1Z3FB9KzaWqS5q3GtVxS98emj9xFGrEkOOSzUrgkYGm5HPTgs0cKUWQXn25srBS0kW/2W4vmffWJp/HSjx4zE7pn581aq6EkIvBK+/GK++4NzPP7KIuRMxqgYnbJTuZi0Yr+vChe6lldnwyQZN0NV2LN1o2Zfc3aTmpT2l9fTN7yS65LWgGQGFtOtqdLXHnIrHBKiph+Pvf5e0z+sXBKn9Fu4lL1xLQH59cOMbdj3PPkyxlNEsH4RfFuW+Vz/g7EfpqPN563482UmMCdmWekdOkHDYU1UqJBLjORP00DaUkiTveDIX7SLJlcP7ULlamalAsceu557Ln72+npTRrgAloyt8EQ1kSk0raWSBq16ImWM1aDxiskcPreMLMLYncjv1WzT9mdv2bLRpy741YbtxQidqSMBBZAvRnaNOa6pCVBiQlq1sulpUrcCoD8tOXBuuJefuinBWiQKvYZj1HW51T1Pml8TYTBoXYfZfFyxgK07ggSEBV+6Uo7CVnJd7Pn57u056+94cqw4xnTVWDS6JoelMkpTr6jZqa3qRIOGqXjPnnBDR5lx7Vy/rP/9ovGdFWX/1uvtAA3Kduisfik4pIR1JwzEkMnT85YgA6ZYn4U91Oi2CS2n3X5qbxNH3kP36H91zKsxnTlhIMmm5c+vS6Z22nGiiejCh60ArJ/LiVfdqo9D+95IVfRg2YocwiVv279UqHwT2kv4qAHVlkY5cTIGQtQm36HQPvF5isAmoQdkURWs669YTtWbdlYZwxpz8SKNzvZHC3/7zRqOaMh4JXvFDKhsAnACfk2RzexwXvv/nbOGvJiUvwGM4Os/1j8dn+dVlrTk2+jnDg5YwGKILWsdMQCQJ/MEAFyVpLD+b/2dp5FathbkMbmxIRyHEBF6iR/FTZkQ/6s5hsW81jZXHfP8dru51uAdjdCTto3oJPa6hAB6gkFHpxqwi3A4mLOoyxOzmiAAkE+qgFFGf25c/qEgNgsFqzeshHr3nJt2covCNEol2F8W5RtB/v5nUz2KNWxYb9TQeRRWW4zPZdS/dN99n3nR1ajEbBAzLAngJBqU235D1qTiEeuyAcdTduTKWccQGsTzfuihZ3lxIQ45lkLn3vBP3q3MVshHKvkMI5d6a9ovGJH5pinzy5qAUjPJhbscEZztgzoc/fndxbwKUhb9oPApKQ2qmo1cAHejyyaXcRmXFlzGQtq01EWL2cUQId9HU9SaHV+PdDXx5mlnGqds6+/gvxITmxQQ9w4XcoFQqsgCQOMwJe2i2iaDGKGqCWiyvIoL9zznZx3y2EcTk7wISWliem+PS1oYwtF3bzbUYuePDkjAMppZ3bqWLyxUSRKCyz7U6MOtuE9N3eZQ/19SljDhkb4M3dguIR3ZUD3U84Y7Ol6OHLZASjfOe09qorn7/6ueYZZbG1pS3PEtFE5DzP8dduOow968uSMACgMu1j7j/G50Wp4ccdT1SpUsP7dN1cxSaMPFS5+iiqhPV1jMUODChISfN6SN5Vdfft/R/a8gFce+lk+zplDs7Ra7RLQ9UGIqvw9Ceba2s9RTqycEQCtQyoIln1cWDpbMf2GmFvF6s3n4+wbLrf6TYl9NdqPtWNT9lDhlRPY9EyAS0kLlESQ/dRgxQQT4unL+MW/+//MrBXJ+bFFm0ZA9SES74eyZrRtq2aAAeDSKUc50XJGAJSFO0QUIFezw1Z9LSfNG+aU5Px/9C57QGABZsxNdUSSlOLEAjzydxsK0RQz15RoNDeHWfY/9DM7G8eEeNzAYjSkmjZR1SCRAyj5zcWs5c9Ra558OWMAOiuJ2wbX61UWbFYMMmliMoG6XzBZfw7Ovv5y2hbQLx4N4wObejDQ+k9vwGqVFZSSHuIQijWrSxLDi/d+D0f2vFgGoyAmXK+aUBNCs/42dXbPZYkof+/Z5Y2ycDntAWoJonRUAwJDqyU7yrkgP9Tl47pyzrntjVi15fyiJWlTXp+c0FUQxsc1rG1OeA98SSlPoShLp0C8v63mWVI5L/TkkLcChmaUzJdJxCCUeaeQlVS/WT7ofOTRCOD55bQHKJtkpn9XHVEGWUVmHOsZLbbznvfhO8nfpA4bxCdzGULEVHfUaj0aWNQkNDRm4Giy/+p8ULVG7qG5Z/HqI0/YtnDklLhcY+9fYgHEDsc96/gnh2pmlRGDWMYtCRckpz1Ao2llYpYokR6czYyXribu58jd/j7AWddditVbzi8amhMTtJA66b+UAdTm2bLmM3dWezwIC9UaGRnsxcctQN37xa9bMx32ObicIfMTZE14k1TNvqBFm0Z+ba6rWr8WiMIxqM4ZZbac1gAVWlGdjrrUtPSv1g5Rri6ok3pSZd2730SmLXW49P/A18vnaFmKBEQAlUyixrC08Bo2LXpdmawoKX8CHNn9Al6853uhKZsJHPBaRHYgSG2IahdtHzZqyMzl68I3VSXTF8bXtjnG0MwxyWkN0Di8wulnHC4AfFiCv9f+nLkTVm0+D+vefVNvdhLLy8GWvAkvpfY5kPN/rIGVDV+eueKWTGHfWHm9of78Vx/++2w5RKZ8rtPgQAIzOAw1SZnxY9tpqP2Kb+/X3/W+cKxRR380ltMWoHX4JH02rkPH5hJrXx92iUIrZ11/mQtllFw2dWao17LWQ+yVaONCJ0rZQykndgLHjiKXZ1ZsINn96a+Y0Eid/F5WU4jakVrUfMbneQ1Ld5iRdgmK1XrtzMyv1aSjzRvJaQtQFqUMoKHAu+2warQvM5LevE2y4cO3mxCIgrZSIDPUJL/7jiWFka3u0cdHkxk7PadpCMBS+3lpTaIE4v0P/T0O736R2qXu1EI7es9uz9lJ75btLhoyaWBvwQzVB243NBr3wjqNYuW0BagnMHgkZtaVTTbAM7PsF5HPVpFDl2HV5vONRgRrTYm/WzMYoUYt6XqNAXjjE+mZJFJUzzOVl3b+IGwrMSscxAunmfPpGeab7WOJOMu+qkvKD+sWJEdwKAduAK7vvbLltF3Vj1lEL6mDTDUQ+6a1H2QTAroipUocWP8rb659Ni1gyaCOFrjuE38UwZaHibDpN+5tFw8z2zSkWSnd5r5mrGEmFWg15757f+DaJ52qMCsfTOsj1mKwyQrFLLZaT0z5Suv/8qwY/q0mmGBGGUti8Tu04FWtwTiGYU5DDVpSyOJMFZtHipD6j15sDhU4f3HV5vNw1luuSkiEj1VmEkeKb6jqNF+qb2A6K5eXUuZMfWz9kBYOc37pgYefqJ9b67ariSNnDWCYNPMm7ZBYcNbt71nfKN+XfVWu/6g0rZx2AAVQTQlTjTKE/CicjtkOw/Q/f6ROsu5X3lwYVfa9pFuZz4ZyqCMaH7fM4YR6VtZKGzPlMt2goeARSTMptvczd5vnTiKQOHvItV8kYlbti7WdJ7HsZ3SM7xcPCPV5CJn58tvKRe1pB1B1SeX9UfeSxRyPRAYmJCvUhBDW3HZVf9z965MPSr1qH1PVp7GrsVE74Dtt6DOSyPdSo71KquD+7z2KIz05VDHShhCTQhIN9GmhdZusNqvfAyjGPCuuTEccmTRfHdRp1mGTeKWC9LQDaC3+TUtlQg2fC5uf6zTuOe+8oTVx2bxFD6rUO0wk1G8ZD2tmKqIkBDuYGFLJhCICcHeF4MW/4Z2yYQklfno3r1WCWGRNCLGWi0IqPi3PXsuEnde67k2E8dva0omJwZXqj56WALXvwq2ODu5IEXhTGWo6NDOw6fez33VdG05JJalJQiBN5sDV5J3NrAmYogmaN+q1pmvxV32VbUodiPA6vGcfDj78pL1EbJyzNv1LXaNQiiVrat9R1ScUWJO0gHFYq1WDSTAgJMD6HGEzrg0840qR0wagJSGbj1pzab6X5F9qAk9EUKzacj7WXH8pHUcNpvJH/1VNP0uAa7fXByptqM50tfm63Wd3LZmTNJF7eu4Lf35PTyC7VQmd5vM+uvdLvTkbgZQJOrgYsieEysDUhO6EtSSQnzV6Z7FfCzN7adSgp1j8C7YdzpILDGSvWaP5oBFBsfZDb8tFK214pJm4IYgZP7EkzAPsM6v1TTOQEzNrNRvU+pwZplnbd3U5+MiT4WDj99T27ePF5+eW8sxbGASZJYpg7qduCl90/4hbsO9JQdkg7j72Xa8kbXraxkEjJhB5ZC0dgTulusC5ByXL6msvbhnVbC5qt2B0jvFpUjN29ksfSq0mYsMkDJTPxsUShZ4poV/I6VIiUF7e+Xd4ffc+DkTwzdwzctsRUBTglR3SIJQ+V69fhw1vuBxrt23FmnPXt38f2rUXR/a/ioPP7cErTzzl3ouSHykUd7ZA7tbVZZDb2OmQtQNe2Cn/Xe49nGK4POW0A6hmIqfzBcWsaj60ip+NmaqbhWFfquLsd16PyZZzzfUVeZFWQ+hvLTR/S4zJaDuO/4RYjaCwyQuAn2xdkiJe2flA5WUPDzoDy5akvF8U0mvjzddhyx1vwdY73oJztm0uu6ClWS7Zz52017/w4CN45sv3tp+Hdu+l92QHTKv9Guej1lrRmtx+Uj4cOG05K0VOC4BytgvPFAHgRuZ8lDqjBfLQ6MogPfsDN5fyp/81xaSOgAc+u+1ZE7oapvN34CNgqHX4pO/VSrmn6lMRpcscOvjInHHGWFv55TUjcKpLqD//Tddi++98CBfcfH0GoG+vTukm5DXtnqSbbrkBF95yY/v7M1+6F4//2Z/j4K49+T0UjY2sVfmYVtMDh12XUp84aWEFKc9WTguA2tFxaO0hySO1Vks/1mZPxEJOZfV1F2PV5Rdm1rW9lpjUXA0UYE1v25CJyp2Iy5d+U6S2zEZz1lCxM0sYJJvIA8kWL/75TlOHoDlSqzhGuZjXCShTLXnN7//HLTC5zlN/eiKTwFRPIZ5usJGUOqjAJR/YgUt/5S48/qefaYFaa+7asqnfTzzpIRpcVxogvZxyksjHv6Sa4V+IA1VPhGjla1aaxLxgxVl3XsdRyD4cUnhXgP01ECGkgItzVilPLoCnStuUuYnMlA4LuPTC1/fsw4Hv/sS1kWdYUIgmN1tHsu+suPhD78Ot/8t/32pP0HPnYnIWVAklpR3T0tIriRhjeeM//Sju+jf/K9Zu22zaha0hBINnlA1GDWgeMALsSgu5nHKAWs1RtKP1SaJZEzaBW3Ug2E2j9aot5+Ksd17r6B0lYoNMSbGsLJ/NMc78LS19wmOCELfbWBa0/deUcEqZJdO0pm1z8DXTRuKmzakHOVkL6ZzLfucf4g3/ycewesO69u8mbx6sNJuGhiup83XN4OFwsXbbVrzzf/+XrS/ruYHaV9bqvbPPOWQ1lfcp1SyclSCnHKCx+Ma3TB5ggezjc1Ilk3cdbdU1F5tsHzVLXGrOvdWBRAjWnlmnMmAsZM1vNt2PEuITRHIsFtj3F/eVJ3fxTD4e+dzJN73stz+IS//xr+d9SdP9Gl4lghgbzWavZrD6fUu53ZKs2bAet/3hf4Ott7+laidrXDh3QCICyJ+vlZ/q+8Fyl9MCoMWkRTaT/EhefhsykdxuXMRFZHLoQ7fRdWoZfSJsTHySQWYIqyaDikFryqfvbb2lmKTIy6EgXzsFz6FH5vD6npesmTwj9pdDKSSX/tZvtP/S8xlQGnO616bp2RiAxn+31ynq2TA3/1f/Oc676orwvXI5rGlrgkkRTYsTt7epT8pYznJaANRLTBb4YwyWck7Nwna/rb7uYsjmc53/1WtOtZsZwRh/sKaf16r2zKyN4PxZD/ZsMabMoX6A2f+1H1UmXOSDmnOkDCAbbroal/zWr/VmdZPN5kgDaVo3ot+ygp++MRqeLQGYoSiVO9Wkv/SH/zVWb1gb/s7ASzyDOoZes6/unx0OyKism+UqpwlAh80fBCNxHSvzqyxwpk931uo731iZnHAmauUjqjdNqR5stipyB8/aSCy7Wnd01lrdOa/v3of9Ox8sPCx1TnUhE/9b+4wb1uHK3/t4O+A0btPgPH2OzF1lJjvBlfaLYXDzFhXeJ033X3fRVlzz8Y+Zd1XegQeUB2FgcVRhmJqXW+6y5ADlDlb7V9a8KUAZOp/PteYZk0mTzRuw+s5r6HxOtUO5zoRF0goMhYVVP6+RDMeSgkegyQnr+TbWNxYuA13cE2Rum56ooYXAbbr1N3bgrK0XGO1tBhmeu5ogqU1hbdXbD2o97t4czuXQwttJtn/419uY6VAK4XCM2X5nF8cDuD5/+cop1KBqzB1+AfUL0Yr1K+eiovbttDDBmvfd1I/8hSgxo7/QNT6PlzoqayN3x55Q6U1JsZ1beYczOD+uP2dazkt/8bVUqUpbVhYCnTP9ftbWTbj4t/8Dev4ePG5XtUL6uLY1QwW84U51bqwvCu+fA1d//KMhqZXvqDXPABOisX2BB2zuEytBlhyg1uxhk6UeJW08FJTHWbO6Ek4obs/Aqjdf3oMwaTnJWkMNKdJ3SkEBcqqVMYUb6uxaWQBcbgYsxUCtcumuPfD9xzpyCMWWi4gybz2kv89909W9KdrkGTIdEJsKhEwSNcxoo4RgiinbZDY3Ab4hkOfF0Pp2mcpUg154y03Ve5+e3zSeHPImO/cHU4LpEyvFzD1lGpTB5DVoZNoBsGZsaOra79PPqe+Jzeca81Rznq3fskGNtuZsBwVpWFjyp2hGAq5aFpmPNyjbRSR55W+/V5Lp+3tEZIlvv3T8on/8qwXEuW4uTJJ3Wyt+Jbe8ElFW2qKc0QKzoXMS0ZR82zwgAJtuviGY05nuY9+ttQriJJTyboeTq5ajnBKA2rCKBZcdSdVkpLCwJjWAVVv2qjuuhk0rYpO19BbWqKUyllAqvqRbsEvtNfRDBoHx57Q89/S/1/fsw+FHf557X+RjahTz7Ae2899+E87ackHR+sZPtgNR5XfDxmQbo0mbMuigscauuk2jjPmsuPQDO4zpqmG4TAKrAJX/KTIJBqiVgdJTAlAmfzAQtJYUgzC0OwPZ0vSA7YDT75Mt52Jy7UWwHhNMcoK66+G0YzHFG6sp/LfK5rJmqfdl2dx8+S+/mWvBhr7XoCITaqdSxwvueqsFirDPyWsiqVvpQfNeMNU/P1A5ALb3TplTSq5BX/4527a0mUacnVUPvnDPVyfIqwkTRetVLW85BSyu/Sy+RQGhqj8HzgSOfRA/w2PVB2+pztHsK6kp2RAkxrcs2oKT3yX7XWpMRA++vmKkOEkb97+/9ujTAcAt05k6qgjMzJuztm7CeW+/qQvxkGPPWg6wpA9rSU1EUtKQUrdBzrBC0aStdpXWQzX1Qx9qmpZ53lVXWJM/cF/4WTXP8qE3WsWA/VIqy1tOAUlk/679jNlro9baVHM2jeUdkbUnjFYsZyhQmY4N+6ViTd5GHYiVgnO87Ee/YDWbpupiiMlKPvj1h3C0J4ci7enr5//e8tH3Z4bakz0Q1oq8EgRpUUqOL/VqKjJJ+XceuFK75237e5A2TatFy3uzhB6/+zTglCR/ZN/X+qUrB5hJlny6mYg1Y7WaJa85DmbTwuwLnf2eBJM73wBsWh9rpn6SFltxmTmsIzzddDRiar1mzAVQRk/awMiwlCYDsfvjwNd+bHxN0MAxayZIOr7+pqt68if1+inggElwbTtlLvv1ZaKa8BxTKVpM8+voz1VkICJxAOxq5PboyKi1F22p34yf0A4YIqqajRT44ghXcliesqQaVILV29wZlAQfmXjWV4TLHBJa9GrV+67vf3fET1dC//+yRWCv9srxZAonU9aRI3DLntg6lXLSDJKGEgQSS3v0+Zdx+NFnqD3UaNAKuC5RYuNdb8GaLRsrc5TrnsxShV9rSasc3SaFVMi8t88BKqO4C97HT62yZv26/q1GJlG9p6gEy9aYt0bgTKBe7mTRkmpQb+L449ExNfut1ECjfpR/n1y7DXLJBfmFssnKak9obZ2UmlfWJ6LJ2VI0hgaMrZqy7G+9rnZrAaHVZK/85f295krXSMXYRqGGdHzjXb+UB5ZiACQtnEI5ziWgJWXaJU36cEvLlCLN0ZbCcEvTHuSJ3bld2iVRjIONfBkUh/fvz3VJFVTKDGIgsha1VtTQdhb1xlnLUU7JigrqdrOqTVcLZHU0fCVkarYj8R1XJcusHfkn/do6ymvX0ghcExdshyerjpIlEtC0QK+An7Sram8ekxZPGvnAYRz6/uPljik5IT3SPItjrdlyAdbecGX7vVGX/MAki5Z1kTSDK92j8xiljEC53tIvfTL9PjWX0wJrKC53SwdBJ/YdZMtCcGT/AWMFwZmpCAbryMSVarOm5a01WZbMxGW6vYyePo4JZ7ZEL8J2Wm8+6aZ1kNvfkAmGyUSKXyi9D0WhhqJZFf7//o7q2U8UX40ZzsKOCoyKp8IO/eBn0AOv2aeU2hiMwhFTufAj7+2Z2xKfLNo0kTeNJa9gQ1E8fwUohA9nSjEBVYilhkgfNmvZBFcc3LXbgbN2T6q3O4MUY14iyhxbjrJkGjTyG/2IGJsyw3+DOlz2Wa/d1neWQmwkDDY8UNhCssYtvyQzV416qOqUTUfJH4UrKSsDTrWVZMAKXv2rb+W2YHWhA9qTTd9V68/Bhrdd34ddJtl37cafzlectCarXRFRm6MmlopsprI5i37cVuZ8suZMv7SLUIvkzYiL6i/Pf/C5PY5HALkrKMNh9VrFkYKWUJqfJFw+soQa1Des37yH3rARNbEwE/gOsowmH3xTf5n2GsZOzPZEk49bcmBfKZldXfBeXR5uIUm0+G+Ggikk0OFHfo6je14u9ViAKmDArn/L9ZB1Z3ekkAudZE2nJRsIzlJQl1GU2t5kPfE5Un4roab0ZPVC3qk+L/7o0f5yG+NmzVvS+upYuLplTMtAPm9zLRtZEoD6EVTVr28rVnNp5IPW/mJmYZMZdM221sTVgDroAMLpfAHoQO4n3VvVGnJlDLGJCrmu6kslBlUVh77+SGkb94kZZm02bz96F7HJlOHjDc6+Y+elS4I5romhbejqaujSksOb7tdQGWVplLIm0/MPPmyeR8w7Ru4P/v1zCmBtsbAVhhWxssKSmLg1yUOEC43a/qX4kEwxe5piUnIo4vYr6eRsmWWSUfp1dzuipx+5+x23sybXYs560qoTKR1WaVDJv5btIyBGdXek1d6X8do3HqnbiA3pgT1Pp2Wcc/0V7b4y2c/My3iqYaRBJJlZt1fKKvrdb+jM3nxMe9Jr0hJMKQbcmvsqKBQQDKGV2i4tz/ncV77Rv1Nee9eSRcBwAoKqUJ8A9Re4vrS81ekpS/XzI6M3WwrLWzqbqlasYC7hwnWQO65MpaWbtB8NaYvIhIYzedPfOaYIu+oegnNRmbpU36zBgSM/eTYn+ktpDHCivNJcT5OcAODcHbdmi6IyuXlgC3Nr7c5sMKY3m/jop5mRhZD8UCbXtExKzzXSpiWHfvGVr9FgJjWZFw1A5e3nd16/6yG/dXnKkpFEBWD5SH9cKK0LCxgRu55SYms9mFvmls5SdbFJIf+QkwlII2gJowAltmkyWNApWaWQTVtOr5nSyvI5pppK68s98Nnv5PqBSaJgVXsvqzefjw3vuSU/e45ntjFK0t7tv7L6fWaaqX7ot2bgMSJnD6GzUATWEFDTeFJME/OeBft+9BPzrjKzbEDKz2k1Kx+zDG5tJi93OakatB79jKdlRvh0LP+qfB6XR7t0sQa7/cqqPKvNGrDe8z6iUp3SYasJ6Y5a/NBGmRRi7W2/T/935Ad/n8khcWZeNpYHVMP0nHNuuKLUB06bkQZDHvAa0qSNsaPVaz62Yrh9he6nNrdXgbwqP/usT/6bz5o0RzOQon6vgNemMQg9N4GBUM1ykpNs4lrfjU2WqGF9zMyX483QfO4db4BcuL4yC02KnKNQ4MgSLjURMIbJFZrdkspkIsnXy/zWXfvaN34C84CsMYHKpBX6N71+40feXYiYvCZQIXo8cOHmsyoRY8bMTawqnZ8T6N1CY/b1pphpIZam2vO1XXvtO3VujdeEMrAvLAJiybtDQwPacpGTbOLyhrA6M3/SB7Fr0oBGT3Xrqb7jynxOaCIWLqfvuEwI8QivZNK65AotZlqOjfq1XR3r2F/ddfC9r+DwD57gByp1HhiwlM5d99ZrO3JIu8EimZ/M1jCppZomOiMTXxSGzcu+dN7hJGvcZALzni9dHSSDmOOnnhR77itf7+teCLdsVlfvu2qO3HJqdk2zv60kOakArUe3OLeyZurKSMu7MgttS5i1woXrMLl2a3VfD9TiW0rnf7WB/DTuE0A4eV5teTlPN/0+9f36FDjVwpIyp5s66KHPfQ/VQxfb3WkX8zDt72vf/aac46pUNrt2xY8UQ7K1bTah5IPkT2eGtTH+dTGFtQdvRxp1SQ79cxvzvXuGQ8/twa6vfrNOcqfZNj7kNttElbDPjIkKJ1Ak2A17FsWu6ql1Lq1+K/LL11kQBrmfhgntwyyofF81viacyarRJGh1s2EG6tj6n48+W+oD6qHB8yNhrv++avN5WHvbGyuG2NYxz1khRpb8TLdOrkJrxhm8uny/zq82FEcl/1NtWt/02O677w/bXWjitc4zv5UTF3ybpOdUXf6+Z5KTDlANZtOrWSgK4KwioWlm7ep0WckUs5Mpe7lmaxg3rEZx3yngTeiKLgKTH0BNyvDF+Yy0iDXd47WvP4Zm7yulHlInkkYhFZl0r+e8/+jOnjmmleIRTb9TWiW+/6/hVRIaF46x6wNHoC0VpDMYmOTb7/7q/TmkYoDnklPqXGtx76n4JJVfLvU6RstZTqqJ681VltrMjUAG1wnL9LL2/LVrgEs35uutpqzL9/VIna34XYBNQaTwAJt+GWidn5VGfe5a0puIU6i8/s2f1NrdbN0gtRVAYF5z/eVkEyKzxuKynqD8rKTXM0445JGOpftMssU8AdmRzn8Xs3lxee4pOA/t2kuDZ9Gevv3tACoDfUBCa2SF4DLLkvmgHnCdSE/M0JHKv+AXRR1velIPTgTaeaH1EynzM9Xfvw8Mcr2lz5YxAHa7ZXO+oD6/H6//5N/XHSsAp6lb/7n2XTdi9Zbz8n2U5266C3iNBA+umgztzm5kCsgSV55MhNqmv0ejrTZPPnAZpJo+lRDYc8+38ivKZJrYjZ3YfeCKs/nrRxs1C3TDxG1XgixRLm6dpgXjX6obOcUyqFWB/ceF66msYVBGPp4FMpux3JkVJgxBgKz8U++T9f9/7XPfz8/jtTzXZyhB4Zx33Wj28mQjtFgVNnziV/IDhVeaPh5aPFYY39qUA2Sg+4W+2Sd/bddevPLjx+n1zMctOJUfPDe/V2tdDL7mZSlLAtASXuGj1rSBN80q/wqA2yQJPUAj39bcKSCNPFCyJgUTQgw1R8x4sgOOPNJuUvbRv5sr51XXxMBM9ZtceC7Ouv5SA8JcjlvYS/1A4pML0u/qQMZ7tagtp/iy5RnVzZCZ/vbs//M3gb/qvwuGUvjUh7T4jed3W97/SgLpEs4HtS+m6xziGr50hSS+A0cdYRY7HMYXZ2jUhlIESyJMb/6JNbeVQjHtNY01fV//4VwLUtMAA88V1W/Dh28nz9YNOnR/AfvG0oVNWjKtacdgpe0mtPcysz/qBgb7Digt0CRQCFnNipdJe8IRPeU+fA+YwVa1rod9Xl7xT4O6Ll856QBln871UfJLbeJBF2QHxUBdJ+r3HhGnNUXE3CQyJz14w1APxTN5mpTxkQi81XpEfcc8/Nc/ICZz9kBRDSprz8Ka6y/pQdjYju7dclg8gTs+Gpuo7sgfE7dNIagOPoaoMkkZZCm8eM/3cHjP8/mZ83pGXDb5DTowt3MW4FJMl5tyJYATS8Hi+pHfdkpvunAcUsKAtHkxz786gx0cqk/9Pbo+sbvJdJXcaVNie6+lmDSiqh197Bdt9tDQfaJ6sTY/+5fegMnm83JbJBCJaYceEFLMwIkBbK3JShwxIFrENHTH7AI5sQPaZBa3S9CYYNcX7i0jhkS8K+hdqjFzYW4X7yCAcGBfOckKJ53FnZ1oIH061/DKbaG5m4iaA0dMn5pMJtm3GgKG/63SwKa2PSjUL2XS9RIpQwn5h929Xv/G40WjdxUw4PT+ckUO/ebb+ucUsxZtwUJX18ak59UMeG8YUlpfd6zRYqKCEgq8CWmJNORZMNNrDj75DA488UzPKg9TxpJt8CgVU4JBqx7YfXkrAZxYqjioVD5ISUSIG1scqUSdhDXwM/vMVWnluci0jXwXCRLrB4VAmjsamXpZg4qi2bsfR7/5U5OQIOH6OnEvm5q2k35HtgxIsTFNa2lTp6e+zb5pmu6WtKwYfzS3LrUZcg5yTvvrp7Whdy/2fPE++LgxkzgxoaPmN46HqlvtEYh2RCuk0kowc08qi2sZOAQapDZfqE8T00gAo8C37t3fmrnl2pokgmNu1W18O6vu6fc8ydls2ZeSJjSp1GziHf3JL8p9qTw/OPg2SbLmzmuJSVW6FwxjSwEXw8Cma7s0PT8YcJuCtoxoCsvLz4QyY6Xbo6Vri9d2v4AX7vlu0G7puS1gWWNGIm4j5kIK1ZbYSgEnlno+aO1P1sdjRo9+84TRA8/S77YzelMWDhjR777+2i7dmRLGOdkc4FADA+ro5x/IZWqgqSPzO8lUc65553UAOI2uDoE0vLID7a/Snis2ONKE82SLVm5omlopJ5VLgSaagrf/xz+z4RFPpknU7n6C+JA1oYY0RLW79sqRJdGgfvQr3/OZ5rra7KnJndzhHnxmUXXyvmCkdRGRRyiBe1WT3tB19geezuRQNACkAchr1HSv1ddeXK0s2G3opGZDXvDyI7DAUx/7dCDv6tHk/T/BcVTaXyYPEDT4JODt+vSXTPv5gXO+dvffI80qLnsIK4zBxdLMZvEa0oMRxOz5l6RO8wQ3+Onu7t88HaPcbzarOuSL+o7lGcccxL+7z7sdGAz6uxhijMF61oduM+Zr2t4vL68pHoCozOF0CwNyA+dS5/L8Wlbs4wGCgJ/usf+hn+HInhdLm0XgCrTekJvvXaG6za0VNS9fsIxkCWazlO+pXa3Gsj4nnZ3JIuszFR8nl/GFh+h+8VYDQ+QRy0LAyccyYFL33bsf+thzg6EGmz0FcErjtLxV110MXLiBtBbdK5vSTZUJBHEgzT4zyNylmS70e96UuF0kjbQtvM/a5EHixZ3ft7xCwNzC+ZRRepHnDLh/UEtX7T9q0BMkSeuxw19rLEsigUDrAV1T9L3J+NNdUNKiQ8Ab1oKdNE0z4zmsD+nJq2knPfovvxwOMr4Dwvjf5fzVd17dQaNvk4b29CwgQ7XrWrdJEqCcltj05qtawgsJglprU+9T+13Fp78f3v08Xrr3BzN9aaEdA9K7jywl3w/8uxkaMEcNeoJEg8QDllkazZs3tpOJS/MT4E++A331cFhG5P9EL3kh9VEXsknHms8/2M5cMXXK19rP6L6Tzedi1R1vJF+wOzkvEM05sETg9CVnn7jhBb36nF345TKJfAJPwHZb5LOFkM555buPgG5rnzUgflTtFLXIpYjapRyrJ/yvJFlyFlfNZO3ZJmbpTAPkEpe391Xg/33IMqKTyczyMY+5NKtDmN+efxVNa2bPP+L750htser9NxitrGqT3/PzOpA1ebVCOqn/zGeZLew1A7npFz5jSAqby71JzVr8hb/5Zmk3v0sA3FKoVRvGYIya2XMXw4zv8pYlIYmG0ruA2FccOqe6eiIm+0W/+hjwReuPYsDsHWYTY6nMxPT33lfR/Kuv5gD7rEEgesZk9k9uvSybrYCfMdKTRWTGmnhsMnWJ5W04vtmfWZvLTTUQNDSDJbdrF1vCSzt/iNf37HPmJyUmgJM3wlY0f80aACs3ZgWBkmWJVpbnpIRgxgSfWTF33qdz/ptbyrP5wo8NSPOVrjMk7TofeeTNMeOLvnCgBedUeyefK30O3VeqVQPQgfPC9WTCsjdZh02YWxU/eLQgLusPqVnSpDxTV03JZnBTDUBUl6Yr7+WdPwzj1PkZ82BstaYli7id7XGvbS2HsTJliVf1SyCd5NX5GLx1vmZ3hpAp5Wn2NLOlnN+BVPqdzoZG3iFm1gN2ELw/3Y3mf/taO51MXBqfDiz/WWvPXnPdepl7vtJW2j//pJ/FA95FO2vm9L3bc6bbsFhNWU1aDSEBKK0s37VULm/636Rf/iSZsNO/j+x5EQcefpKumd1mqT6J2GLxQPSalZPrV1rc08uSTjcrUje46ZTmAiXt5LWptmYuAhNIv/BjNPc/Cfkv3psndpvfF7g0iieEcOAI9As/QnP3Y/HzspbIA4xUj206dL9sqCptAQHDhRHYJAOp7ujo5700Lru/v5YHEpN3e7QFtbrNjoTitc//+b0BoUPk0MQPPN6lqUGN3D/8bBetrKWVKks23UxkfjZTg3xVraYaef/N3s+M3M+/Cv1vP4/JHW8AfuMmA9RZLK5Wyd+9hr7/CejUfO7zf/NvaXZJf2uheZMCvy6PIzrWnQXdtN7EHcWnrydNmhPW6+ltGXQqli1lTyGhPk0b6+Okecpa2a+/lSbNJRXBoUfmirnqBxpD/sU+f/2uuQxvDXjraWZRy1pOugZVmrsnwewWK8OUeyGbNDDtSvKC5gFhkntlc/8TkPufbPdvaXdAu2ZrvoYBI2K3Y2jlwBHg7p+02jiHUUhzTHgR51zfmgzJ9VK3yvqlF/REziTfvwtvSDsYtas4SGkEpdURADfZugVaaqemNXZVy7SUqYncmq9ptXvttl+caj9jTsqkXz2ik1fue6Alh7J7IfZZrckdx6Fj9nYhvmVkAq8cWRIflEmdKBaqvZrwSQueycPgyy6Mpg/hENkI/dYTrRaUzRuAyzZCL72gWxlw/VkFAwcPt5oXzx8AfroL+vSL+XqzIdAgK6t1pxLkfUjZgmuvnd6bVx5g1ls79nbSA631LvuV49Nzp3pXmrIdCBJIm0y6pP0/u20huouavJg3MiveoPisr9z3YPBeamKnmMcxGcTXlsuisuLJ+itRlmxd3Nm/xfR7fb0nX+yLzebmjAyUVnNMNeH03wPP5ONNU6aLWU1M3ydCAPADj2dwramZNTz5gG09166hp0v1t2RYXg2/DaX0qybkfWb6RTOzeW1ai1ZBUJihI4dWuouEViZhTTrVnIcefsq9D7sD9qRfktObuZF7gyDd0b5DuM+VjdIlY3E9Ztgc8r4jn1P7pGpG2Or3bPKlD6+FWdWg8tU8oaOuPt0X3sogP2HIRtrwixt0gr431WaTfjOjBmX92wm1Y2J3J7nuwWrr/UIMalV2tgTUrAlM2wjy86hi3198bSCODDcAlYhdigl7UbMe0dB7looVX8mypKv6oQKqupcRmbY1wIYIJwOCBEDwWkf0uyGYou0E4pFezRIppTzMYzHw85i1jqI4KS9Elkinvr2YlW0SMPoVEifJxMy7l6lZFYHLhFnGRctKf8lVAHB070s4+P2fhow3P7N9T5x/K47wsYOjJwNr03hlgxNLv8N2bepUrCadD9QrEHj/0pqCdt3UzHRS56w1avnOIQZ/z6ERP7OYXiPPbAyqz9MvhLlSNu2u35ksaSnRYor3C3pN+gQF5DWHaMcyU4bYkA1rV5QtIKZy6JGnoQcP5zgnuxUpPlq0J5u+WrXv/FJfP8oSAdR32tkEAG8HYc1eb+qmkbqcWwPW1wOwsUoGVg6XJCuXtx1EqUpFDvUkkLlPYCIDKKviJb/yhQOD7dY0Tc+6FndAO7633JeTAVpfUsu2/tmqdVsi9u3S0JKcnUYGVkk57+W//EbgguS3lMFtuYQhZlYqNj6/g8AywkIHu2UuS7Sy/JAvml6ouGMwKV6WKUSVTSTh6gXSv/SkdWCnVgmy+ZiT6qkqwnuLiOV+EsFjdlmbCDjLJ5cPN3fVraagBw5Df74vbLcU0tC89IhSC1GeLifYo0y4Rn7ashJ+MnHVMN+UtdP/8tqjT+Ho3pereGtum0lJxbONxyQZPQcPELCuBCepsKx0cGLpcnFrlg5BJowEq+zN8g1Zi5ZrIpKBfRwx5/H9DMizs2frz78rnZDrKMFzk+ZFZEH0c1lN+ex7w6124BcDU5u9yzm7+e80KMFOX2vLbJo2USEtMjY99urXHs6sODzbGvBhIhicMJAG1Nh8rVMBRymyZACNyJ4kwh3HnW9Z0BrQtTad3/dhgqmm84WYRmRQ8/3t73DAt/X0QOc/8vkPPjOoLYyPLgpWaBl+opTsrpmtVb+PSk64b1C8gpKEn+7z+t59OPi1h3IdI0smDU6F2Jvd5kBEFlGLDFnGK1yWDKBePBPLnd52ChBbivw7M7Mx4C3Aym+15uRBoAZnVfNBP8uTYFVHrCY09/d9bBfk8T2ufep7KG94xBsb9cBUWhoFRGwpLdfZkInbznohYCaAv/b9n6UnKNEZ8Sard124PSOiDWb+69Dvo1hZcoCyv1FMnlpzuqvyNQmYEdDgTGOQL8txS88Mg4Cr6uN19ndfxwhI5VlgwTxwanvfbz25IJ+L53+Cp4rBzfVk3xQ079N9KrV/uv7glx6oBkn7XHVGmPcr/bkxcWfDXaOpW8uSA7SYOczepReqtU8Hq0lrMqh8l8EFwnSwDL4H39PHOdk8kz6f1fvQs7RrOWtgn9D7nwBIi0Zg1Wpt26L1SiiINCWfI+yXlrVzNa0Y2J//6l99B6/veSk/UrEu1NXFtp15RonN/fo3XbB5vFLlFGjQ8uJEovioXwpFQ9bPkj/9maSxVIdY4GH/h7VyAaEFo1YrnceDgbtDqdeMGJ9++oemHnU9a7Y6Jx4YrdkY0GZ3QLw5C4J60wLzwGe/Tcnv5T7ifGyrXblOQ6YvqnuLyQIbbJYVLadAg3In8WaN1UKx+aiVT+TP1WDPj8gX9d8LI6xIcURmJ4Fui/g6VFSb0pGJbLQJbYCULYln90E/84OFt2GCVkOLhNGqfJmVBcgUthv/lpUDgVf+xefKRkzcPijhHjZVyzOpe+46AYVB6Rn9iOwbpZNTQhLxe4i+R2TCfNfXJpg6LWpK6I/Fncn7o0lbWw0yMWUUcHuyakCDE15Nx7z78c7cnUd0YJkTgMMuGPTxDXMLxYH/4240e17JIRXDuIonc4YtBq89I//V++Y65t0OypKl+rGo+uB1EaE9Q33AzQJKUGJonDwfk0Bw+bZReAZAkONbA1CyNpkEMdqaQEnPI1Wyv7pNhnowfeo73UW3X1mZtKH/qjTpOh+kthT6u/+Rd+g+/Pnv4/DXH8tANOBUGO1ZTNj5tJ0lgGTBa1GNwnJKAJqksLG8ajwM2Gqmzyar60D6mB+RNdr/M/CFUJleVrtiYI/LIfG+K2BDTKnanIrXZvf8yXeBQ68D771moO26aV5py0VK8APDEFA71km7dXn7qQeO4PC/+zZeb7dKtM+OYEAwwHXP6NssBibMYDrK/HLKAFp3/CQSsrl1BxBH1qhLO4Pxj7zJGyVFRHWMTK8Y2F7DgjStmHxh+4z97BOVCqT49A+Ap1+AfPBN7XIt3lRO4DT17X7sStYE3nI76S2Oo08/j8P/59fR/Pz5XJ5vZ25Le1zMs0Sg1iBnefQxj13k8ivuOi3GMtup69+SeB/HExeRzDIxLbDIzCx3CbXmfD5T7RtHZaP8nT+0ag9sWg/54E3Qd2zP9+b2iOomvZ8skpb+6oF18AiOfvVRHPnrH5Kv7Sdaw7QxyNrxZiuc1q1DT3Vbei06+p/DctoAFN70q8S/2KHJ3IOlA2bGC8x3HchksYMG+7bJB44HCH+NLSsyxTUAqQW1XLgB+I0bIbdeBqxbE9SVtBXFW1t/88ARNHc/iuYrj7ZTyLhdiithfXcJVvGrrRSYZ5kltWaF+XuUWk4rgHqJXuBCSCSEmhYDo3l1V2eK+utqjWFANDi1zhJbUq1kN2xyV6CelnPrpcA1WyCXXdAuPDYFrBks9u6HPLMPeOalbnOpx3a5aWeoQFZrz4mxOKzLgPDaaKCz729C9axdmVGsnLYA9awqH7fHhin66PjiRuv5QCu0EPcQSIdAzvNa+05Mq+4BcL9LZmGRtG06vHZN9/nqkVKPkCmX2ixNPqozeTGgGZMVYS2Y2AoB/M7ao+ZcqJxSFjcSkXqJkvlkiPzhMtNvCwWs929rH7IA1fqyQyasVFqTyxUp5rvy2rgSscVix4kErINH8jq2eXqZwl0buxEJzOVZJAyHWNJIqzKnn5OJZ8trzTryRQuTUzabZUjqQHf9sq0w+IA6i2cYgP5+/vgQsIt5VsBWTEABopks4bPa51ae8YGytpBnb0GdHnAzc8BrHdm2iAigXF728SfULgvd+k9cO8C0myeTUt1H7Tm/nHYA9RLFLxGOwENmVDkWpaKlazHQCTkoPx9bXDpzrKU8S1o0TbxbGBxhlEzRaNDi50vfK0uETNbI35wl8yUn+KYrAB8eIMewy/xy2pm4LMdijmJgZr4PD6TOiwpItQ9lTec4UB8ROrPq67VmXY907cTEeX220HCIyRFnsCvBm71jTDuwee7ZWq18Tt8OPubc1xpRYsLoey5cTnsNCsRJDUrLaHhN4TsEm1YegPW9nOmncDm9w/4siw9H1J3Zao/JREJ2lE1ms8CZK7P6HmzTYM+T6pnT8dpXlMAkrcGJStNK1X6YYRWNUssZAdAhqYFpfR0xC4/B/OZlCLj+OjXJ3jMAYgaEIY0h8GEGcfmwaqZnTSoTOLp/Ltod8MkIfiASqX3OqH1tO0kQ6ioatFwSTfIeZT45owHqZbY5Wb5HHYVBbc+3APfaKzL97H3EzJmUaiUIVGhSrY8rrfRgfxP3HZVP681MNvttmb4use8tIm4qXmkbNfm71rWIzPtRZssUoE+d6kqcTNFgBojXCl6TwGgLdRoNlGMbnT9rmpxkjVjM9vg8+gsRM20/2YysgetjmuyTR35k+m6BKQHw4wQL/0wjFhct+5aVBh2SWf6iBwwfB+JwAIOVj7F5xwD34YphH5KviTSU9Yl9WUPZSL6e3ifsS6dPCdok3pmu/hRT3yi0M8qCZW6iqg+c6lqcSVJ3uPp3z7AOpRTGoZ5J5dsyUSNumZiIwLKm7oTKmRjztL53DabauhBizWvyDvD1iwe+UeYXhb60WoC5U12RM0miPFvusBLszDUrPKRuWhr92t8v39lppBj0It4vVsN2e59ZBjatArkHPvVvlsiYxnfCRBUPTKb/O9UVOROlZlphkgRYbE4tDPjY9PWZNzBm4pDpae5E9bEDia2PLZOfKRokLOsbPQ/AIRWMmvKEiEywc7JqFXae6oqc6cLML5ug82XeDIV2av+xBs0wcysVY1zqNgn9Z3/PYtr6c+sV+co9/fXl+yiLk1XAA5O5uZ1zy53JPRkym4QpJE8SCZeYZHAhYErt9aiIGMvu2lCRGD8VQYLAQs1Qn/wOR6KJwIVqRub2BMgDU2wmBuFTp7o2y0kihtQzrHU8M12LMP44lNQfySxwxNlYPt46/FxWSw+tLzT/KhejzJZG9T6kRIUJmtHMPU4Z1h5R8gBMvmoxB9O16vzZgZX8XGJA7UNiwMyuiSbvZ0bXFB8Z8KtTWE09AvN4ZfUErdJsATo3t3OnYPRFj08iM9D8ZTRPlHg+FFKRYMK3Z4utyenBGiUvTFx9UJVfnsOSQrNmtkQx3lGOWabmbUve5kSFRvRPTmmVznDRYEOhOtaoJgkBiLOL6hUKo6QEy8TOCoOkRHwYcspq7qHwTbpHOXcCn1CvbueyMcRyfKKif5y+my50+RV3PQlg+ymp1TIRcQtileOWxBma0TE8xc5qtBJ7LWWW39mX9VvYl1S+CIw1sKRKdxx6xlFOiMw9/dS9V6Y/TKqfiv7RKanSMpGo4/oQTDl3UhFHvrN75tdqvjgdEAasnBsrhryJEx08EQSqH0xd+V5jSOXEicdg1aJXXHHXvQrsWNJaLVORgbV+RWyWz3wZR/66Y7kmujZJIqTcmTPrjtAamPf2oyxMjPZENN1MRH9/Sau0jCVKSrfaTyqWNmJkOb83Eh/bjH5LJi7nz/owT6wBre/qATmC88TJRPQuf2yVP7Bv39xz51+w/SVAfnXJarYCZCj5YCjR3K52D5pbOnsRtDjxXQIg2t8jkinSoqMZe3KkUf2jp5/a+Tl/fLC1R1P3xIv3/yLtM8tktP5sWYtXaGHuGmh13qzOs+18ZJIPrfk0yvGLAPc99dS9IdYG54OK6G9inOlyQqWEU2K/Lvpur0cw+8VrSi8x2aMDi6BhALQjOE+azInoJ4Z+HATo3NzOfb1NPIL0JIsHWqzVouT1sDRXbjnmmeRyv9noG2OaJ03mphjr8+FDmbmiQpusO4J0yYQTEDxRxLHQGqgMXp/zW87BDHCPvuWSy7zgxCwflGX79h3bG5V7xySG00uOJWNnzO45rWRB4MRCV/VLmnTM1z29ZCgbKYlNDRzBeTqIAPdNRN+8EHBioRqU5fLt7/1DqP7Bomo3yigrWUR+/+m5e/7nY7pkMfcZTd5RRlm4TLWmiH4yzVA5xmsXL5dt3/EJUfmDEaijjBLKnIr+0c/ndi56QYQTQt1NgTpR+aQCt5yI8kYZ5UyWqcZsRD91PMCksk6cbN++49amwSdEZMcI1lFWmDwFkU9N0Oycm9t5wsjUkxb8mvqpAKaA3SEitwLYqMAV08+Tdc9RRlkC6RbYa5er1TlVPLBqFXYulJU9Vvn/AwAA//94bbMNr+p2tAAAAABJRU5ErkJggg=="/>
            @endif
        </div>

        <div class="page">
            <!-- Header -->
            <div class="page-header">
                <b>@lang('admin::app.sales.invoices.invoice-pdf.invoice')</b>
            </div>

            <div class="page-content">
                <!-- Invoice Information -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <tbody>
                        <tr>
                            @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.invoice_id'))
                                <td style="width: 50%; padding: 2px 18px;border:none;">
                                    <b>
                                        @lang('admin::app.sales.invoices.invoice-pdf.invoice-id'):
                                    </b>

                                    <span>
                                        #{{ $invoice->increment_id ?? $invoice->id }}
                                    </span>
                                </td>
                            @endif

                            @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.order_id'))
                                <td style="width: 50%; padding: 2px 18px;border:none;">
                                    <b>
                                        @lang('admin::app.sales.invoices.invoice-pdf.order-id'):
                                    </b>

                                    <span>
                                        #{{ $invoice->order->increment_id }}
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.sales.invoices.invoice-pdf.date'):
                                </b>

                                <span>
                                    {{ core()->formatDate($invoice->created_at, 'd-m-Y') }}
                                </span>
                            </td>

                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.sales.invoices.invoice-pdf.order-date'):
                                </b>

                                <span>
                                    {{ core()->formatDate($invoice->order->created_at, 'd-m-Y') }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Invoice Information -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <tbody>
                        <tr>
                            @if (! empty(core()->getConfigData('sales.shipping.origin.country')))
                                <td style="width: 50%; padding: 2px 18px;border:none;">
                                    <b style="display: inline-block; margin-bottom: 4px;">
                                        {{ core()->getConfigData('sales.shipping.origin.store_name') }}
                                    </b>

                                    <div>
                                        <div>{{ core()->getConfigData('sales.shipping.origin.address') }}</div>

                                        <div>{{ core()->getConfigData('sales.shipping.origin.zipcode') . ' ' . core()->getConfigData('sales.shipping.origin.city') }}</div>

                                        <div>{{ core()->getConfigData('sales.shipping.origin.state') . ', ' . core()->getConfigData('sales.shipping.origin.country') }}</div>
                                    </div>
                                </td>
                            @endif

                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                @if ($invoice->hasPaymentTerm())
                                    <div style="margin-bottom: 12px">
                                        <b style="display: inline-block; margin-bottom: 4px;">
                                            @lang('admin::app.sales.invoices.invoice-pdf.payment-terms'):
                                        </b>

                                        <span>
                                            {{ $invoice->getFormattedPaymentTerm() }}
                                        </span>
                                    </div>
                                @endif

                                @if (core()->getConfigData('sales.shipping.origin.bank_details'))
                                    <div>
                                        <b style="display: inline-block; margin-bottom: 4px;">
                                            @lang('admin::app.sales.invoices.invoice-pdf.bank-details'):
                                        </b>

                                        <div>
                                            {!! nl2br(core()->getConfigData('sales.shipping.origin.bank_details')) !!}
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Billing & Shipping Address -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <thead>
                        <tr>
                            @if ($invoice->order->billing_address)
                                <th style="width: 50%;">
                                    <b>
                                        @lang('admin::app.sales.invoices.invoice-pdf.bill-to')
                                    </b>
                                </th>
                            @endif

                            @if ($invoice->order->shipping_address)
                                <th style="width: 50%">
                                    <b>
                                        @lang('admin::app.sales.invoices.invoice-pdf.ship-to')
                                    </b>
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            @if ($invoice->order->billing_address)
                                <td style="width: 50%">
                                    <div>{{ $invoice->order->billing_address->company_name ?? '' }}<div>

                                    <div>{{ $invoice->order->billing_address->name }}</div>

                                    <div>{{ $invoice->order->billing_address->address }}</div>

                                    <div>{{ $invoice->order->billing_address->postcode . ' ' . $invoice->order->billing_address->city }}</div>

                                    <div>{{ $invoice->order->billing_address->state . ', ' . core()->country_name($invoice->order->billing_address->country) }}</div>

                                    <div>@lang('admin::app.sales.invoices.invoice-pdf.contact'): {{ $invoice->order->billing_address->phone }}</div>
                                </td>
                            @endif

                            @if ($invoice->order->shipping_address)
                                <td style="width: 50%">
                                    <div>{{ $invoice->order->shipping_address->company_name ?? '' }}<div>

                                    <div>{{ $invoice->order->shipping_address->name }}</div>

                                    <div>{{ $invoice->order->shipping_address->address }}</div>

                                    <div>{{ $invoice->order->shipping_address->postcode . ' ' . $invoice->order->shipping_address->city }}</div>

                                    <div>{{ $invoice->order->shipping_address->state . ', ' . core()->country_name($invoice->order->shipping_address->country) }}</div>

                                    <div>@lang('admin::app.sales.invoices.invoice-pdf.contact'): {{ $invoice->order->shipping_address->phone }}</div>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>

                <!-- Payment & Shipping Methods -->
                <table class="{{ core()->getCurrentLocale()->direction }}">
                    <thead>
                        <tr>
                            <th style="width: 50%">
                                <b>
                                    @lang('admin::app.sales.invoices.invoice-pdf.payment-method')
                                </b>
                            </th>

                            @if ($invoice->order->shipping_address)
                                <th style="width: 50%">
                                    <b>
                                        @lang('admin::app.sales.invoices.invoice-pdf.shipping-method')
                                    </b>
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td style="width: 50%">
                                {{ core()->getConfigData('sales.payment_methods.' . $invoice->order->payment->method . '.title') }}

                                @php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($invoice->order->payment->method); @endphp

                                @if (! empty($additionalDetails))
                                    <div class="row small-text">
                                        <span>{{ $additionalDetails['title'] }}:</span>

                                        <span>{{ $additionalDetails['value'] }}</span>
                                    </div>
                                @endif
                            </td>

                            @if ($invoice->order->shipping_address)
                                <td style="width: 50%">
                                    {{ $invoice->order->shipping_title }}
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>

                <!-- Items -->
                <div class="items">
                    <table class="{{ core()->getCurrentLocale()->direction }}">
                        <thead>
                            <tr>
                                <th>
                                    @lang('admin::app.sales.invoices.invoice-pdf.sku')
                                </th>

                                <th>
                                    @lang('admin::app.sales.invoices.invoice-pdf.product-name')
                                </th>

                                <th>
                                    @lang('admin::app.sales.invoices.invoice-pdf.price')
                                </th>

                                <th>
                                    @lang('admin::app.sales.invoices.invoice-pdf.qty')
                                </th>

                                <th>
                                    @lang('admin::app.sales.invoices.invoice-pdf.subtotal')
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($invoice->items as $item)
                                <tr>
                                    <td>
                                        {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                    </td>

                                    <td>
                                        {{ $item->name }}

                                        @if (isset($item->additional['attributes']))
                                            <div>
                                                @foreach ($item->additional['attributes'] as $attribute)
                                                    @if (
                                                        ! isset($attribute['attribute_type'])
                                                        || $attribute['attribute_type'] !== 'file'
                                                    )
                                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}<br>
                                                    @else
                                                        <b>{{ $attribute['attribute_name'] }} : </b>

                                                        <a
                                                            href="{{ Storage::url($attribute['option_label']) }}"
                                                            class="text-blue-600 hover:underline"
                                                            download="{{ File::basename($attribute['option_label']) }}"
                                                        >
                                                            {{ File::basename($attribute['option_label']) }}
                                                        </a>

                                                        <br>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        @if (core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax')
                                            {!! core()->formatBasePrice($item->base_price_incl_tax, true) !!}
                                        @elseif (core()->getConfigData('sales.taxes.sales.display_prices') == 'both')
                                            {!! core()->formatBasePrice($item->base_price_incl_tax, true) !!}

                                            <div class="small-text">
                                                @lang('admin::app.sales.invoices.invoice-pdf.excl-tax')

                                                <span>
                                                    {{ core()->formatPrice($item->base_price) }}
                                                </span>
                                            </div>
                                        @else
                                            {!! core()->formatBasePrice($item->base_price, true) !!}
                                        @endif
                                    </td>

                                    <td>
                                        {{ $item->qty }}
                                    </td>

                                    <td>
                                        @if (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax')
                                            {!! core()->formatBasePrice($item->base_total_incl_tax, true) !!}
                                        @elseif (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both')
                                            {!! core()->formatBasePrice($item->base_total_incl_tax, true) !!}

                                            <div class="small-text">
                                                @lang('admin::app.sales.invoices.invoice-pdf.excl-tax')

                                                <span>
                                                    {{ core()->formatPrice($item->base_total) }}
                                                </span>
                                            </div>
                                        @else
                                            {!! core()->formatBasePrice($item->base_total, true) !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Summary Table -->
                <div class="summary">
                    <table class="{{ core()->getCurrentLocale()->direction }}">
                        <tbody>
                            @if (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax')
                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.subtotal')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total_incl_tax, true) !!}</td>
                                </tr>
                            @elseif (core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both')
                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.subtotal-incl-tax')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total_incl_tax, true) !!}</td>
                                </tr>

                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.subtotal-excl-tax')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total, true) !!}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.subtotal')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_sub_total, true) !!}</td>
                                </tr>
                            @endif

                            @if (core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax')
                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.shipping-handling')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_shipping_amount_incl_tax, true) !!}</td>
                                </tr>
                            @elseif (core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both')
                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.shipping-handling-incl-tax')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_shipping_amount_incl_tax, true) !!}</td>
                                </tr>

                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.shipping-handling-excl-tax')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_shipping_amount, true) !!}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>@lang('admin::app.sales.invoices.invoice-pdf.shipping-handling')</td>
                                    <td>-</td>
                                    <td>{!! core()->formatBasePrice($invoice->base_shipping_amount, true) !!}</td>
                                </tr>
                            @endif

                            <tr>
                                <td>@lang('admin::app.sales.invoices.invoice-pdf.tax')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($invoice->base_tax_amount, true) !!}</td>
                            </tr>

                            <tr>
                                <td>@lang('admin::app.sales.invoices.invoice-pdf.discount')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($invoice->base_discount_amount, true) !!}</td>
                            </tr>

                            <tr>
                                <td style="border-top: 1px solid #FFFFFF;">
                                    <b>@lang('admin::app.sales.invoices.invoice-pdf.grand-total')</b>
                                </td>
                                <td style="border-top: 1px solid #FFFFFF;">-</td>
                                <td style="border-top: 1px solid #FFFFFF;">
                                    <b>{!! core()->formatBasePrice($invoice->base_grand_total, true) !!}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Content -->
                @if (core()->getConfigData('sales.invoice_settings.pdf_print_outs.footer_text'))
                    <div>
                        {{ core()->getConfigData('sales.invoice_settings.pdf_print_outs.footer_text') }}
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
