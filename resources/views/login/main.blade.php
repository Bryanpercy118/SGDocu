@extends('../layout/' . $layout)

@section('head')
    <title>Login - SGDOC</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                     <span class="text-white text-lg ml-3">
                        SGD - Sistema de Gestion Documental
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Icewall Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('build/assets/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Unos cuantos Clicks mas para <br> iniciar sesion en su cuenta.</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400"></div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    {{-- <img alt="Icewall Tailwind HTML Admin Template" class="w-60" src="{{ asset('build/assets/images/logoHPR.png') }}"> --}}
                  <img alt="Icewall Tailwind HTML Admin Template" class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAACB1BMVEX///8BgsbJnpjgW0W5hX2dPjT///3eXULs7OzjWkX7+/vx8fGdQDLv7+/39/dusOB2vQDz6Obi4uL2+vH9//rc3Nzy9+kAgsr06+kAg8Te7cnS0tLHx8eGVkwAgcCGwye8vLt5uwDn8tqMwUDi79Gr1HCGTUSCXlaGcGurqqeOiKnW1tW4uLja7MLH4qrT6rmOi4ek1Ge214cAYoqWylG82pEAdKwAjdCmU06lKSUAfslvr+XUfWrUi3jXlIHdsaXevrPg0s7pgmrsjnXwnYfzsZv2var62Mr949nUMCUAZpfAg3bCqKSUHhSgdm+jjofOy9p9dpxoYI2wrMNgV4oAAGbUopW1d2uCKyTTXUqhPS2/U0KZORrhvL6rVVSenpxzo7qrxNQvj8GOoKZbfIfc6vJ6j5qc0fR3cW5GXWQAT3VNeZZmY1sLWndKk7Cgtr1baXFCaoabwdxCp9tfkbmz1uoFbIuCueEOj8m64PRIaXIVTWN1w+5Ad41odXegx9twl6hieoyHtMqPRjdOZItGQkx4bn2VAACGIxtHU1hXUkqobGBeUVHSPipnW3BqmKq8XT5kJxKhKzEDpO1vOiy3Kia1LA5ePjbBjoXMgoM6Tkyea2WkjY5Ddpytvbq36/yGKAYvHmublq/CvtWOh7RHOoOCfJydmajk4fFbVIdRRoUmEmmIhJGh4D7WAAAUHElEQVR4nO2cj2PbRJbHx9AKIdeKkS2ZWNrIkmzAv3/ETiDlji0Le1zKD9vKbaFscZuSNmmTNiWBpqQb2sICBXbZu8IelIU77KRNc/0j772R5dhpWpzUabjrfBLH0mhG0XznzZs3I9mEMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwG41fNkT/s9hXsNk8e+vyR3b6GXebI3r37Hm4Nnjz45r63Dj/cGhx68+1HH33YNdj72OMPuwZ7UIOH3B/s2ffo44/tZRowDZgGTAOmAcI0YBogTAOmAcI0YBogTAOmAcI0YBogqMHjD/v6wd5HH33o7WDv46wv7H3sMdYXHnvr2T8e2e3L2FX2HH778DuvbLWUKslE8hKeJxFVI0lN4yFJIrwq84REMIeQpPtJlXjVZJLIhMA+kWjppJz0kaQkC14v3dfgkCTLXp+qSUSFNE2WiQBlvT2s6D3Ys+/wd9yWS6WgqklN0JKkpsZJSovABiTJUBGiqknIIWLFNFBLgCQBdUmlCCYQKlKERFASHncFejYZNBVV4tMiUH3Cy74k8SV7WNF78P0fD2yjVMoLDQk1Ummja2IKk8AuvLwmpFTYIwLvjUADwx/QRcWsmqbSTJhV0kjE5yOS6hVRAyzq82mogaZGJCHi1bzwC9bwQHhB2E4pEXoBFhSISP/Cm5f3QcXdZAL9RMQ/XmeLZnQyYWkfPYVAfJiJpuIZsSA9lw8OQSrfs1q2M9HXP3D0AfWyXyfCsWshT2hkVNztC9k9hPh4yNPv8Qwd3+0r2TW4SG7BA4Q873YeECa2bBgc9SIcCbalKUpHloDSkV8Q2kYfzt1W8AAcUtYzcmSz7R4hxidHQyMesIQTHekTJ/vmta2dKmBZwfU3Ssky9GK6lSOa1w2roDQPmzpixQJuZqOZ08JkeOXdcjE92zqHabSSe4W3Njk15OkfGTglNVMmYIM/e7Kvb/9p39bOpVv0zbDchJjfKsQMw62AaRixgu43os6uYuixWExvZc/4w86GZVlUhJh7Hsufaf2TgL/nGpDU5PTUzOjgKdXZnThzFoSJn7jY19c3r27tVFaRvunrlSrB30DRaBp1wTDBlrPuYcUo4FvJH3WzNzUIBGE7ygVdczIN3Wp1gIDRkqZn8LXc5ORSDq2Au3B+fBAjEDU3ex40ONcciiWO8N2YhOXUrqWBpdO3KJUCyDsWYDYPK36qQdqteksDIOsKgxSs0vpuwN8DDYQJoG3/yUg8flabmHhvbtgzs0R7hJabvnp6/hxGdmTiwtHU+9dCI+Mbw7M7Xaal54Giq0GznUGUpvUWDAM6ebrl+oyYGY1mDaPpEO6mQdDIcOtOoCcaEPns1x8MDi30nW/SNz6+sBAaDnkGp+KqdOzYhE+uTU5PTmpQ/wsfXZyfPHoNho3QaKcIZ+/QgNOhr/uhnk0NTH9Tg2YfIQE4DhSbNq4Yfj8WcPv63TRIg0gxtz/1yA5UCNLjuQ9nBocGPKH+UKgfaxgaGVrMaTCzSR6HXkC1uXjx4vn9faenjw9DhoFQ6E9tJ7nwwSadw9KjpmlGXQ2CTafGrTt4M1MCp9istGIU09lstjWI3E2Dom5GS0azP/XIDiQtkorH47Xc0tTi4OgQDQ5CA57FeJL3SdAxTvS1MT+bexdiqJGQx3OqFU6LfYM0jt8wq9joE4s6rV/arbRT27DbRRTXTprcRQMFbcvwuyftjQbg9+VIvFbL5cAbTk9BE0OY6Bk6wYtc8AmtNjnZrP5+lGAJLIbGkZ6Qq4Hw3vAMuo0LF90IotktHJ/ItTRI+/NgwWFddzt8Ad1had0OutKgZATEgBhzEwLgGmDICHbGXttC8MpaCmxhchYtHWo4RD1gUIrnpr9eF2FJjeSmwVT6IY/TF4SP5oYXYQqfhBBi/4c0SWuOH3fEBwW/kbf8bugDndrIxyy/1fIHGzQw2jQwWhroNJfpNn/AcCIoi/QGEWr84fDIABr7UByiXMKJWm368sVWT0h5YYyYGhoJhTyn0CeKHy0MezCWkGpL8yARDjOXms4yYFFvp1jF1mCeLUIctD6sZTEiKrSGfavTqkvWekSZ0d3trEU9gWJZSrNUEX4s18/2ADpbQA08AydIkIOYXY5PNjXYD5GiGkzGMYgaHFyEik+cHwarGYxAwWRuevbyLC9cOLkeSTUDfq49oFcCHf8voLRNJrgNkf9mcwdIdM/KreeC7c7z3gcwaYQxsR8mDP0hcHP4//hUrt0OiA89xORSTRMv9A3TzLQDiPFcrnbs/ZPn+y736mJ2CW3+mqfF0DHU1xdxNdgP/uAyx/EqjiLH+haGqbl4RnJPAAfix6+cBAX2911+ojue7Bav8KQodNK83PuYMQpvPwu882wb79Dfjz+Z61/XoN9zBuJHXyp36SJU7fTpeVBh/jh6jWPz4wvDGEZgPOH58743n/r00vmTTaXmv/nY4al78Bt83cHTv3l6M555+plfZNIh3rUIRz577rlvX3tuA4c//2RuZF0CCJZGwBT41OQV6ARXv/rqi+uX5/vmz0IQvbBAxw6Po8HMl898+ulXX9FxA8fPM1+++PyLz9/JP93BP2/CHzbyQie/3ciBdnKRrkU49Nq/dvCXv8Dv3/86198f8njaZRj6WopPngQJajiVembp9Mxg/7AHI6T+9TxP/e1vH3/z79gP9lNTOP38i2387sXfbeSlzXj5pZc7+P0d/MtGXmnhdC1RPDDZ9Sqz+B8bRAAJvj13Dcy7v12D/n7PyAe1SyfnZyOqFjl+ehyHgZBjAy2x+j2D0Iu+mT3ZFkm9fg8NNhXgpQ0CvPz7rWnwStO9CAcmu17uOvLZt23VR/7+yRzWDDvD0CAAQTNWN+QZhfhY5SfOj48PDI2O0lja06GUZ2Tq2Y//86Pz7SH1bTT+Q7QLHDp0CF8dHNyU7/Z8d/C7Th7BVwevPvLqXYmkIpF4ruv7AN9/9lobn3/++bk59AD9ntHF69PIF1evL+IsChr8Q009eundpaXZ2atffHF9qKO7IAMDU99comYwPz9/+vLlc7PnZq8+/SXlB+fvDz/gq8Xr9PX6L/AG/P7jjTb+4f6+8eqr8BvfhFQq1XVvENqkfeGFRw79eA07+cDg1FdPP1Or4eQB5g7TVxcHIWAa/Uk6gIE0Jk9O/7hRAnQPZ96HkePc1asg3uRkrrbFBadfBRNnruFYPziVi0eSEgKzB9RhGmLCodDQWRmm0TIAsweMojbYgWfuv/ouX52EKAnAxvg/qIE8fm3EM3BqKpeS2zyKT07hYDC59KfRUfeGllSbXbijL4Q8F6/MzByPaBqqx4uicxKFmOkgCZiKYtIuGohm6LJZloY2JlHSAcIpTgZ32kTMDE3E7BzuO6l0n84Y4Fg0DPErlDEDAdNUuKAC2/cdKatzCyNoAylp4xFewxl1/KfTM15Xg3E3Ngi5zjEUmrtyamBk9KfOskF/oZi3SKZo+DOgBcnqhQxOBE2DKmGUYKrDBQwuU9SNTHNBzShYeSOg4LpjwFBgJol1UwyqUIa+KXq+CHOrgFHMF6OZYt4ww3ndX0rfpwja3HBodHETBRBvEvxAilPfddo2cuaaawb9WPsQ3ZsbpHemrnSU5HDB14Lm1gOkYClKazXZmfzqRY6zsgF/EDIoJKbTowbM/kqZAM6Ds/4ACftxGT7jp6IVdVxnwIUWxa8E9WacnI+SoG6CQFFyH2gLw0Mzs/FNFaDIqYjaXBeRags4ejSDo9YYOeAJDeA9yh/b7wFz2N5QNToDLmTM5lIpp4fpgoGRhc1oABqX3nQp0BmxHzYzJaqB5VegZnlaecxgQjnUAM4KhiG01qaiJIbaZO5jNYk7dm14dKqWvOegKjUFwmnlgBtK9jsy0JU3GFRBmf6BdlMIGkqwEIP5Pe5kC6RgWBnsEnnnog1TiaFNcyZdcU8XqGxg/7qpQJEorjbFMqChqWfwWKyERoVGY1oZSDRNE02haHLUJMz7WEM5tjCweFvr8ka7euIazhAcJ0AFGBoahXhqZubUzCIwM7P4butUQcM0Chwp0QbOwF8lbEGzgllk9axCjKge46BJSangZkBhYkaJoAaxjBUAK4LSmRKqFAA1CsV0QLHSuPCc9+s6NayimaYrtNFt320SriwMTsW7fYqBry24nQBCRqj19etf0IDAIVeLtMepQSNQimEvwJ2Yc3/N4KAORV23ogQqH8MVUVLKrmfQ02gqoAFoA5U2FKg+2IUBGuXTuqUX0V/m4Yyc2+y64qhX6lyH24IE7y0snuh+LE+dccbFgdFTi1OzSzmk1gwJKJH2BXZOV6DDOxoEnBXlgAEeUc8GszGUg4N+jiltGQxaEjSA9tfp+GAVio5XsawwZgVRcLQINH0i+JOM42K3uaYqXhmaij/ZdXb59gIVYGZqCeseT0W0pCxLkhcQKR1OBfwBCevQgIQ4HoBw+QIMB9QhQhsHoc/j2JjFDHlnbbmlAbh6I5CONe9RxrLOujsKoKNNwFhAc3LgGqJoEoVtukTx6GBO3cJDBfH54dDA6OJsrhaPqDIv/sLcBDVAT6YXsnm4wmymAON61mk/GAUM2IgVcFzQY+l8swoGPRrUcfg0AjhW0CG1VGjW0YpivyB6WMBb1KUwvWtTzGdj21xRFY7+KbWVh46SJ66FhhaXaimV70o4DuNBJUwCpRKObZlSBmqTaUZ+YYINH0xzGQ4zuHfjm+9RPJjlwnhbGqMn6POO6UdNDrOYJkiayUTTNH8QTr2FerQhXDmxpYfaBIgQZ2ZrKt/zxz52D1nb2rM12onhxdoWy/w/Q4yPL0Ye6uf1IDw6/oHc016gCBj94AZEfDSMpq4C93BDCBDs7QLswqwTE83gvU73ABC0E3efUGyLYsaKFSDkCxow9KPT5Oit2Fjeb2Vh/pMuxvIwjoQNK28FzXw+phs9u5O0TUS514/ExvB2swlzCsNNcW5Hp4sgC1a+hIFPtDUNyJc2O8uDprffk5WnAX4sw7kaOHYQoCGCrqRhUg2TpKg78If1Xv7zbSJ+/9891SDmhPmZgKEIQXrflGrgRP+FdLhI641WQf1A2z3oXePI3r29/TxTni56FLIxA2aAuO1oYNHkohkuZvMGzIsRDu+49/J/bwvx4Jv7evz9SHm6OGRFA0YgSB2BowFdbQrqwXQsHFbwgQXHDvT7WibqCQfffLvXn2ujdgDWHjTc5wjWNQjnSdqZIDT9Qan3z6JumR34nCvagWmESWtcCFINihAUBC2YDzgapKkGQcO8y1keIDuhQTRTwCeXg0apRNeagnqsVIqaRjZrQXLTDtI6HExDHFFan1jtEjugQdosOY8iYvUy7oZJwrEYjR6dGgcwMQ1/4Dd895M9CNhnvpkGCNNgixqsru7sxewSW9BAbqyWf767Cnyl2/+53OVEtV6mb2W7lSDL9l1zb5/uNSjbPokrl+963Ju4Z3Fh/eq7E4sjdWdtd/1/LpN7/P/t07UGWEW+8wPIHRekJu7duquuRMnGza6uTNLqBMtormSSWlXvrfM26VYDjlaxueiOa48+wuHHd91leFGrgkZubkz1NiNlZ5lOtSUsg1uVVeIV1j8PgNsdS3n4kAO8JOgK+Enhcr1ZUK7b5Z3oCl1qUF6Vx5ytul3nG4lVrw3XUwdLqJBqY7lByjdXGqLdWMYsvrVypQydOUFsOyEmsA6E2GvyasO2iWRXq8QuV7yibdOaN1I27gvlavkWXddtQIFywy7LFbnKk0biZ15cbtQJb1fXZHtHPgLdlQac6E1SDUShUuduBGz5hhyUbLlsCzcIXJncaGhVsSKTKjahtMY3QJzVFW9imdTrZTAQwt+0RahR1VvX6g07JTQa4i0qQR2cbCIlgKRVsUoTVDCRankZNAQvm9DUMdC9XBUSmp2Q6zshQZd20JClNTTd+u0Vvm7fbNQbXh6Mf0yrp+oJqP4NtVEt1zUZu26qWtYSdkVTq/EVb70eofYbuVGulyOrNypyZExdk9R6XS5jZh9YjjwmJ5dvVlMNzOiDHi/e0rQEnLpRL9sRu16/GWnYULqikp3wiF1q0BA0yYaLkyqJRjKxXC436j5oG36lXLYr0OSNG+pYpbwsU5+hrSh1O2FrY4mbtnRrNbWCnVld0+q2VlXH5MSKvMLH6xXNa6MfGCMNaU26mdCW1Rur6Aeq0MGqfGJNHSsn7LqdWrHHVuMr5bFyfUXu8eLvVjTgoTdGSKJSt5NlkhLhjdQb0mo9WU6UpbJPuhFM1Bs3OTuBvZVvVBNlzVuBNmxI6moFrB5aV7Q1slxX+UalnPCtVusBKYFtmiTlesoL7oNfVXns7NDUiZTXrsh1yZYaKbFyc1lbrZTBaqqrjR0yg640KDfg4jSfTxDwu0rgpULTysSrCTguJEkymdTwOy1oZrW6it9wkoTjRIzwEerFZAGSROLTpDh+SwjBLwhBpCQ+HcbjiMLTRpZkjsgqnyKSIMpQJiKJmjfiFSNSamfq36UGPjoo+7q8FWU37v+iHjBdaJAc28KdOHFboxc0ermcsuvLlSoyNnZrbGwMNirLdbuh/uLDAPfJL2vgk7f4ofiuEUUIGRKV6tq/ufzPzytr1cqNRKJu2/j0LH2uVla7fCZgu1AN7vk9WdIONYJU/7m97reqn96+fftm8/mfVCoVUVVVlpJJ347fEQcN3tq3G9+TJfLJVJVW/9ZfP72dg5pH1KSEz/488EvZs/ftfc9u5yuS7hdRjudur0Hj1/Bh8l2o+Tr4PVk763HuThyfpd9hf9cNBw/vhhE4cLtffcpvu3+Cj8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwHjr+F9v1c8zwL+TDAAAAAElFTkSuQmCC">

                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Iniciar Sesion</h2>
                   
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <div class="intro-x mt-8">
                        <form id="login-form">
                            <input id="email" type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email">
                            <div id="error-email" class="login__input-error text-danger mt-2"></div>
                            
                            <input id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                            <div id="error-password" class="login__input-error text-danger mt-2"></div>
                        </form>
                        <div class="flex items-center mt-4">
                            <input id="toggle-password" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="toggle-password">Ver Contraseña</label>
                        </div>
                        <!-- <div class="flex items-center mt-4">
                            <a href="{{ route('password.remember') }}" class="text-blue-500 cursor-pointer select-none">Recordar Contraseña</a>
                        </div> -->
                    </div>
                    
                    <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                        {{-- <div class="flex items-center mr-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">Recuerdame</label>
                        </div> --}}
                        {{-- <a href="">Forgot Password?</a> --}}
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="btn-login" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Iniciar Sesion</button>
                        {{-- <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> --}}
                    </div>
                    {{-- <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                        By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a>
                    </div> --}}
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection

@section('script')
<script>
    document.getElementById("toggle-password").addEventListener("change", function() {
        var passwordInput = document.getElementById("password");
        if (this.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
    </script>
    
    <script type="module">
        (function () {
            async function login() {
                // Reset state
                $('#login-form').find('.login__input').removeClass('border-danger')
                $('#login-form').find('.login__input-error').html('')

                // Post form
                let email = $('#email').val()
                let password = $('#password').val()

                // Loading state
                $('#btn-login').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
                tailwind.svgLoader()
                await helper.delay(1500)

                axios.post(`login`, {
                    email: email,
                    password: password
                }).then(res => {
                    location.href = '/'
                }).catch(err => {
                    $('#btn-login').html('Login')
                    if (err.response.data.message != 'Wrong email or password.') {
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            $(`#${key}`).addClass('border-danger')
                            $(`#error-${key}`).html(val)
                        }
                    } else {
                        $(`#password`).addClass('border-danger')
                        $(`#error-password`).html(err.response.data.message)
                    }
                })
            }

            $('#login-form').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    login()
                }
            })

            $('#btn-login').on('click', function() {
                login()
            })
        })()
    </script>
@endsection
