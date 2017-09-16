<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AgriAnalytica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/plugins/iCheck/square/blue.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    #modal_form {
    width: 800px; 
    max-height: 700px; 
    border-radius: 5px;
    border: 3px  solid;
    background: #fff;
    position: fixed;
    top: 45%; 
    left: 50%; 
    margin-top: -350px;
    margin-left: -350px;
    display: none; 
    opacity: 0; 
    z-index: 5;
    padding: 20px 10px;
}
/* Кнoпкa зaкрыть для тех ктo в тaнке) */
#modal_form #modal_close {
    width: 21px;
    height: 21px;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    display: block;
}

#overlay {
    z-index:3; 
    position:fixed; 
    background-color:#000; 
    opacity:0.8; 
    -moz-opacity:0.8; 
    filter:alpha(opacity=80);
    width:100%; 
    height:100%; 
    top:0; 
    left:0;
    cursor:pointer;
    display:none; 
}
.layer {
    overflow: scroll; 
    max-width: 750px; 
    max-height: 550px; 
    padding: 5px; 
   }
   p, li{

    font-size: 17px;
   } 
    .asd{
        margin-left: 25px;
        font-family: Lobster;
    }
    .cont{
       margin: 5px 30px 5px 40px;
    }
    .register-logo img{
        width: 360px;
    }
    .login-page,
    .register-page {
        background: #f1f1f3;
        margin-top:-5%;
    }
    html, body {
        height: 0%;
    }
    .register-box-msg{
        color: #79a22a;
        font-size: 19px;
        text-align: center;
        padding: 0 0px 0px 0px;
        margin-top: -15px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        padding-bottom: 15px;
    }
    .register-box-body, .register-box-body {
        background: none;
        padding: 0px;
        border-top: 0;
        color: #bac7b3;
        text-align: center;
    }
    .form-control::-webkit-input-placeholder {
        color: #bac7b3;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 40px;
        padding: 6px 12px;
        font-size: 16px;
        line-height: 1.42857143;
        color: #79a22a;
        background-color: #fff;
        background-image: none;
        border: 1px solid #79a22a;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-control:focus {
        border-color: #008d4c;
        box-shadow: none;
    }
    .login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
        color: #79a22a;
    }
    .form-control-feedback {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        display: block;
        width: 38px;
        height: 34px;
        line-height: 42px;
        text-align: center;
        pointer-events: none;
    }
    .btn.btn-flat {
        border-radius: 4px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border-width: 1px;
        width: 100%;
        height: 40px;
    }
    .btn-primary {
        background-color: #79a22a;
        border-color: #698d24;
        width: 360px;
    }
    .btn-primary:focus, .btn-primary.focus {
        color: #fff;
        background-color: #008d4c;
        border-color: #008d4c;
    }
    .btn-primary:active:hover, .btn-primary.active:hover, .open>.dropdown-toggle.btn-primary:hover, .btn-primary:active:focus, .btn-primary.active:focus, .open>.dropdown-toggle.btn-primary:focus, .btn-primary:active.focus, .btn-primary.active.focus, .open>.dropdown-toggle.btn-primary.focus {
        color: #fff;
        background-color: #008d4c;
        border-color: #008d4c;}

    .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
        color: #fff;
        background-color: #008d4c;
        border-color: #008d4c;
    }
    body {
        font-family: "Open Sans" ,'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.active {
        background-color: #008d4c;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.hover {
        background-color: #698D24;
    }
    #go, .text-center{
        text-decoration:  underline;
    }
    a {
        color: #79a22a;
        font-family: "Open Sans";
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }
    a:active,
    a:hover{
        color: #698D24;
        text-decoration:  underline;
    }
    a:focus{
        color: #008d4c;
        text-decoration:  underline;
    }
    .col-xs-4 {
        width: 100%;
        padding-bottom: 15px;
        position: relative;
        min-height: 1px;
        padding-right: 0px;
        padding-left: 0px;
    }
.checkbox , icheck{
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    padding-bottom: 15px;
    color: #79a22a;
    padding-left: 10px;
}
    .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
        position: absolute;
        margin-left: -125px;}
    input[type="radio"], input[type="checkbox"] {
        margin: 5px 0 0;
        margin-top: 1px \9;
        line-height: normal;
    }
    .radio, .checkbox {
        position: relative;
        display: block;
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .icheck > label {
        padding-left: 10px;
    }
        .ya{
text-align: center;
        }
    </style>
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><img src="cabinet/site/template/img/logo.png"> </a>
        </div>
        <div class="register-box-body">
            <p class="register-box-msg"> Реєстрація нового користувача</p>
            <form action="/registered" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control" placeholder="Ім'я" required>
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="last_name" class="form-control" placeholder="Прізвище" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="phone" name="phone" class="form-control" placeholder="Номер телефону у форматі 099-999-9999" pattern="+38[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="retype_password" class="form-control" placeholder="Повторіть пароль" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="row">
<!--                    <div class="col-xs-6" style="margin-left: 20px;"">-->
                        <div class="checkbox icheck">
                        <label>
                            <div >
                                <input id="checkRules" type="checkbox"  required>
                            </div>
                                    Я погоджуюсь з
                                    <a href="#" id="go">правилами</a>
                        </label>
                    </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Реєстрація</button>
                    </div>
                </div>
            </form>
<!--            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i>
                    Sign up using Facebook
                </a>
            </div>
            <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i>
                    Sign up using Google+
                </a>
            </div>-->
        <div class="ya"><a href="/login" class="text-center">Я вже зареєстрований</a></div>
        </div>
    </div>
            <div id="modal_form">
            <span id="modal_close" class="modal_close"><i class="fa fa-close"></i></span> <br>
<div class="layer">
                    <h3 style="text-align: center;">УМОВИ ВИКОРИСТАННЯ</h3>

    <div class="cont">
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Представлені нижче умови використання і надані правила, в подальшому <b>«Умови використання»</b> або <b>«Умови» </b>,відносяться до 
веб-сайту AGRIANALYTICA, розташованому за адресою <a href="http://www.agrianalytica.com">http://www.agrianalytica.com</a>, що є власністю компанії SSC Ukraine. 
Використовуючи Сайт, Ви погоджуєтесь з цими Умовами використання. Просимо Вас уважно ознайомитися з ними. 
Сайт AGRIANALYTICA залишає за собою право переглядати Умови та вносити зміни в будь-який час.</p>

<p><b class="asd">ВМІСТ САЙТУ</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Представлений в мережі Internet вміст сайту AGRIANALYTICA (надалі Сайту), включаючи весь текст, графіку, візуальні, інтерактивні і призначені для користувача інтерфейси, зображення, фотографії, назви товарних знаків, логотипи, програмні коди, далі спільно іменовані «Вміст», включаючи, крім іншого, структуру, дизайн, зовнішній вигляд, концепцію розташування і загальний стиль даного Вмісту, що входить до складу Сайту, належать і управляються компанією SSC Ukraine. Весь вміст Сайту захищений авторським правом, патентним правом та законодавством про товарні знаки, правилами торгівлі, а також іншими правами в сфері інтелектуальної власності, і законодавством про недобросовісну конкуренцію.
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Окрім тих випадків, коли це явно вказано в цій Угоді використання, ніяка з частин Вмісту Сайту не може бути скопійована, відтворена, опублікована, розміщена в Інтернеті, відправлена ​​поштою, публічно продемонстрована, закодована, переведена, передана або поширена будь-яким способом на інший комп'ютер, сервер, веб-сайт або будь-який інший носій для публікації, розповсюдження чи іншого комерційного чи некомерційного використання без попередньої письмової згоди компанії SSC Ukraine. або уповноважених її представників.</p>
<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Водночас, Ви можете використовувати інформацію про послуги та продукти (в тому числі і програмні AGRIANALYTICA) від компанії SSC Ukraine для використання або завантаження з сайту, за умови, що Ви:</b></p>
<ul>
    <li>зазначите обов’язково усі відомості про авторське право на всіх мовах у всіх копіях таких матеріалів і документів;</li>
    <li>будете використовувати представлену на Сайті інформацію тільки в особистих, некомерційних інформаційних цілях і не будете копіювати або розміщувати таку інформацію на будь-якому мережевому комп'ютері або передавати її в будь-якому середовищу передачі інформації;</li>
    <li>не будете вносити в зазначену вище інформацію ніяких змін;</li>
    <li>не робитимете ніяких додаткових заяв і запевнень або надавати гарантій щодо таких документів.</li>
</ul>



</p>



<p><b class="asd">ОБМЕЖЕННЯ ВИКОРИСТАННЯ САЙТУ</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заборонено використовувати Сайт або будь Вміст Сайту в будь-яких цілях, заборонених законодавством України, а також провокувати будь-яку незаконну діяльність або іншу діяльність, що порушує права компанії SSC Ukraine або будь-яких третіх осіб. </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В окремих випадках Адміністрація Сайту залишає за собою право на відключення непідтверджених облікових записів, або ж облікових записів, які довго не використовувалися, а також змінювати або анулювати послуги. Ми також залишаємо за собою право відмовляти у використанні Сайту, послуг або анулювати право користування Сайту і послуг за будь-якої причини на наш розсуд.</p>
<p><b class = "asd">ОБЛІКОВИЙ ЗАПИС AGRIANALYTICA</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Для використання певних функцій і сервісів Сайту необхідний зареєстрований акаунт AGRIANALYTICA. Ви можете самі його створити, або в деяких випадках Вам його можуть надати адміністратор, наприклад, роботодавець або уповноважений співробітник компанії. Якщо Ви отримали акаунт AGRIANALYTICA від адміністратора, він має право переглядати, блокувати або вносити зміни в Ваш акаунт, а для Вас можуть діяти інші або додаткові умови некомерційного характеру, зберігаючи при цьому конфіденційність раніше наданої Вами інформації .</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ви несете відповідальність за всі дії, що виконуються в наших сервісах за допомогою вашого облікового запису, а також в ньому самому. Не повідомляйте пароль від вашого облікового запису стороннім, а також не використовуйте цей пароль в інших веб-додатках. Якщо Ви виявили, що у Вашому акаунті або за допомогою паролю виконуються несанкціоновані дії, змініть пароль в Вашому акаунті або зверніться до уповноваженого працівника компанії AGRIANALYTICA, допомогти Вам у цьому. Якщо у Вас є підстави вважати, що до доступу електронної пошти, пов'язаного з Вашим акаунтом, отримав доступ хтось інший, змініть пароль і для цієї електронної пошти.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;У відповідності до зазначених Умов використання, Ви погоджуєтесь негайно повідомити компанію AGRIANALYTICA або уповноваженого її співробітника про несанкціоноване використання вашого облікового запису або пароля або будь-якого іншого порушення системи безпеки.</p>
<p><b class="asd"> КОНФІДЕНЦІЙНІСТЬ І ЗАХИСТ АВТОРСЬКИХ ПРАВ</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;При роботі з нашими Сайтом, Ви дозволяєте нам використовувати свою особисту інформацію відповідно до Політики конфіденційності, з якої Ви можете ознайомитися на відповідній сторінці сайту, а її положення є невід'ємною частиною цих Умов використання. Крім того, використовуючи цей Сайт, Ви підтверджуєте та погоджуєтеся з тим, що передача даних через Інтернет не може бути повністю конфіденційною і безпечною. Ви повинні розуміти, що будь-яке повідомлення або інформація, надіслані на Сайт, можуть бути прочитані або перехоплені третіми особами, навіть при наявності окремого повідомлення про те, що пересилання є зашифрованим і передаються по безпечному каналу.</p>

<p><b class="asd">ВІДМОВА ВІД ВІДПОВІДАЛЬНОСТІ</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Компанія SSC Ukraine не гарантує того, що Сайт або будь-який Вміст Сайту, функція, послуга або продукт (в тому числі і програмний) будуть безпомилковими, постійно доступними, або що будь-які помилки або неточності будуть виправлені, або що використання Вами Сайту призведе до якихось результатів. Вміст Сайту, так само як і Сайт в цілому, надаються на умовах "As-is" (як є) або "As-available" (як-є). Будь-яка частина Вмісту або будь-яка інформація на Сайті може бути змінена в будь-який час без попереднього інформування. Ми не можемо гарантувати того, що будь-які файли або дані з Сайту не містять вірусів, небажаних або руйнівних функцій.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Компанія SSC Ukraine відмовляється від будь-якої відповідальності за дії, поведінку або бездіяльність будь-яких третіх осіб або будь-якої третьої сторони, пов'язаних з використанням Вами Сайту, Вмісту Сайту і будь-яких функцій чи послуг Сайту. Всю повноту відповідальності за використання Сайту або будь-яких Пов'язаних сайтів Ви берете на себе. Вашою єдиною мірою проти Сайту в разі незадоволення будь-яким його Вмістом може бути тільки припинення використання ним або ігнорування будь-якого його Вмісту. Дане обмеження є частиною будь-якого договору між сторонами.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Положення цього розділу застосовуються до будь-якого збитку (матеріального і нематеріального), а також до невиконаних зобов'язань або пошкоджень, викликаних будь-якими неполадками роботи Сайту, помилкою, недотриманням умов, пошкодженням, видаленням, затримкою виконання операції або пересилання, комп'ютерним вірусом, несправністю лінії зв'язку, крадіжкою, знищенням, несанкціонованим доступом, зміною або використанням, як з-за порушення угоди, правопорушення, недбалості, так і з іншої причини.</p>
<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Компанія SSC Ukraine закріплює за собою право на наступні дії, які можуть бути виконані в будь-який час і без попередження:</b></p>
<ul>
    <li>Вносити зміни, припиняти роботу або обмежувати доступ до Сайту або до будь-якої його частини з будь-якої причини;</li>
    <li>Вносити зміни в Сайт, будь-яку його частину і будь-які відповідні політики або умови;</li>
    <li>Зупиняти роботу Сайту або будь-якої його частини, якщо це буде потрібно для виконання профілактичного або термінового технічного обслуговування, виправлення помилок або інших змін, або з іншої причини.</li>
</ul>
</p>
<p><b class="asd"> ОБМЕЖЕННЯ ВІДПОВІДАЛЬНОСТІ</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ні компанія SSC Ukraine, ні її уповноважені представники, постачальники і дистриб'ютори не несуть відповідальності за втрачений прибуток, недоотриманий дохід, втрату будь-яких даних, фінансові збитки, а також будь-які збитки, якщо інше не передбачено законодавством. Загальна відповідальність компанії SSC Ukraine, її уповноважених представників і дистриб'юторів по будь-яким позовам щодо даних Умов, включаючи всі можливі побічні гарантії, обмежується сумою, сплаченою Вами за користування послугами Сайту (або, за нашим вибором, повторним наданням Вам відповідних послуг). Ні в якому разі і ні за яких обставин компанія SSC Ukraine, її уповноважені представники, постачальники та дистриб'ютори не нестимуть відповідальність за непередбачену шкоду або збитки.</p>
<p><b class = "asd"> ПОРУШЕННЯ УМОВ ВИКОРИСТАННЯ</b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Використовуючи Сайт, Ви погоджуєтеся з тим, що компанія SSC Ukraine може в будь-який час, без попереднього повідомлення та на власний розсуд припинити доступ до Сайту Вам, і / або заблокувати Вам доступ до Сайту в майбутньому, в тому випадку, якщо у нас будуть підстави вважати, що Ви порушили ці Умови використання або інші угоди або повідомлення, пов'язані з Вашим використанням Сайту.
Компанія SSC Ukraine або її уповноважені особи мають право розкривати будь-яку інформацію про користувача (включаючи особистість), якщо у нас будуть підстави вважати, що таке розкриття інформації необхідно у зв'язку з будь-яким розслідуванням або скаргою щодо Вас, використанням Вами Сайту або інших дій, пов'язаних з використанням сайту або для ідентифікації, визначення зв'язків або порушення розслідування щодо особи, яка може порушувати або втручатися (навмисне або ненавмисно) в права або власність компанії SSC Ukraine або права або власність відвідувачів або користувачів сайту, включаючи клієнтів компанії SSC Ukraine.
Компанія SSC Ukraine закріплює за собою право в будь-який час розкривати інформацію, яку вона вважатиме необхідною, для дотримання чинного законодавства. Ми також можемо розкривати Вашу інформацію, в тому разі якщо у нас будуть підстави вважати, що чинне законодавство дозволяє або вимагає таке розкриття, в тому числі і обмін інформацією з іншими компаніями і організаціями для захисту від шахрайства. Також Ви погоджуєтеся з тим, що будь-яке порушення Вами цих Умов використання означає незаконну і недобросовісну ділову активність, що завдають компанії SSC Ukraine збиток та впливають на її репутацію.
Інформація на даному веб-сайті може бути змінена без попередження.</p>
</div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary acceptRules">Я погоджуюсь з правилами користування</button>
                <button type="button" class="btn btn-default modal_close" data-dismiss="modal">Закрити</button>
            </div>
            
        </div>
    </div>
</div>
<div id="overlay"></div>

    <!-- jQuery 2.2.3 -->
    <script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php SRC::getSrc(); ?>/lib/plugins/iCheck/icheck.min.js"></script>
    <script>

        $(document).ready(function(){
        $('a#go').click( function(event){ 
            event.preventDefault(); 
            $('#overlay').fadeIn(400, 
                function(){ 
                $('#modal_form') 
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 100); 
            });
        });
        $('.acceptRules').click(function(){
            $('#checkRules').prop('checked', true);
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 100, 
                     function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay').fadeOut(400); 
                 }
                );
        });
   
        $('.modal_close, #overlay').click( function(){
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 100, 
                     function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay').fadeOut(400); 
                 }
                );
        });
        });
    </script>
</body>
</html>