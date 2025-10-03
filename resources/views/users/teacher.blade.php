<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات استاد</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">جزئیات استاد</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('user.users') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('user.save_detail') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $user->name }}">
        </div>
        <div class="mb-10">
            <label for="family" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام خانوادگی :</label>
            <input type="text" name="family" id="family" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $user->family }}">
        </div>
        <h2 class="text-2xl font-bold text-gray-700">لیست دانشگاه ها :</h2>
       <ul class="mt-5">
        <?php $i=1; ?>
            @foreach($unis as $uni)
            
            <li>
                <div>
                    <?php echo $i; $i++; $j=1; ?>
                    <input type="checkbox" name="unis[{{$uni['uni_data']-> id}}]" id="{{$uni['uni_data']-> id}}">
                    <label for="{{$uni['uni_data']-> id}}">{{ $uni['uni_data']->name . " " . $uni['uni_data']->city }}</label>
                </div>
                <ul class="my-1 mr-10">
                    @foreach($uni['colleges'] as $college)
                    <li>
                        <div>
                            <?php echo $j; $j++;$k=1; ?>
                            <input type="checkbox" name="unis[{{$uni['uni_data']-> id}}][{{ $college['college_data']->id }}]" id="college-{{ $college['college_data']->id }}" value="{{ $college['college_data']->id }}">
                            <label for="college-{{ $college['college_data']->id }}">{{ $college['college_data']->name }}</label>
                        </div>
                        <ul class="my-1 mr-10">
                           @foreach($college['majors'] as $major)
                            <li>
                                <?php echo $k; $k++;$l=1; ?>
                                <input type="checkbox" name="unis[{{$uni['uni_data']-> id}}][{{ $college['college_data']->id }}][{{ $major['major_data']->id }}]" id="{{ $major['major_data']->id }}" value="major-{{ $major['major_data']->id }}">
                                <label for="major-{{ $major['major_data']->id }}">{{ $major['major_data']->name }}</label>
                            </li>
                            <ul class="my-1 mr-10">
                                @foreach($major['lessons'] as $lesson)
                                <li>
                                    <?php echo $l; $l++; ?>
                                    <input type="checkbox" name="unis[{{ $uni['uni_data']->id }}][{{ $college['college_data']->id }}][{{ $major['major_data']->id }}][{{ $lesson->id }}]"  value="{{ $lesson->id }}" id="lesson-{{ $lesson->id }}">
                                    <label for="lesson-{{ $lesson->id }}">{{ $lesson->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                           @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
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