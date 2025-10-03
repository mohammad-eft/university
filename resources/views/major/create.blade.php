<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت رشته</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ثبت رشته</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('maj.majores') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('maj.store') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام رشته :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" placeholder="نام رشته را وارد کنید">
        </div>
        <h2 class="text-2xl font-bold text-gray-700">لیست دانشکده ها :</h2>
       <ul class="mt-5">
        <?php  $i=1; ?>
        @foreach($unis as $uni)
            @if(count($uni->colleges))
                <li>
                    <div>
                        <?php echo $i; $i++; $j=1; ?>
                        <input type="checkbox" name="unis[]" id="uni{{ $uni->id }}" value="{{ $uni->id }}">
                        <label for="uni{{ $uni->id }}">{{ $uni->name . " " . $uni->city }}</label>
                    </div>
                    <ul class="my-1 mr-10">
                        @foreach($uni->colleges as $college)
                        <li>
                            <?php echo $j; $j++; ?>
                            <input type="radio" name="{{ $uni->id }}" id="college{{ $college->id }}" value="{{ $college->id }}">
                            <label for="college{{ $college->id }}">{{ $college->name }}</label>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            @endforeach
       </ul>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-md border bg-gray-300 text-lg transition-all duration-200 hover:bg-gray-600 hover:text-white">
                ثبت
            </button>
        </div>
    </form>
</body>
</html>