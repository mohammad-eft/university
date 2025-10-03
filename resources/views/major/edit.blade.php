<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش رشته</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ویرایش رشته</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('maj.majores') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('maj.update') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <input type="hidden" name="id" value="{{ $major->id }}">
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام رشته :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $major->name }}">
        </div>
        <h2 class="text-2xl font-bold text-gray-700">لیست دانشکده ها :</h2>
       <ul class="mt-5">
        <?php  $i=1; ?>
        @foreach($unis as $uni)
            @if(count($uni->colleges))
            <li>
                <div>
                    <?php echo $i; $i++; $j=1; ?>
                    <input type="checkbox" name="unis[]" id="uni" value="{{ $uni->id }}" @foreach($major->college as $college) @if($uni->id == $college->university->id){{ 'checked' }} @endif @endforeach>
                    <label for="uni">{{ $uni->name . " " . $uni->city }}</label>
                </div>
                <ul class="my-1 mr-10">
                    @foreach($uni->colleges as $collegeData)
                    
                    
                    <li>
                        <?php echo $j; $j++; ?>
                        <input type="radio" name="{{ $uni->id }}" id="{{ $collegeData->id }}" value="{{ $collegeData->id }}" @foreach($major->college as $college) @if($collegeData->id == $college->id) {{ 'checked' }} @endif @endforeach>
                        <label for="{{ $collegeData->id }}">{{ $collegeData->name }}</label>
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