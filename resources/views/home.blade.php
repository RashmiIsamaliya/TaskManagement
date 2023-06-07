<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            overflow: hidden;
        }

        .formbold-mb-5 {
            margin-bottom: 20px;
        }

        .formbold-pt-3 {
            padding-top: 12px;
        }

        .formbold-main-wrapper {
            display: block;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 550px;
            width: 100%;
            background: white;
        }

        .formbold-form-label {
            display: block;
            font-weight: 500;
            font-size: 16px;
            color: #07074d;
            margin-bottom: 12px;
        }

        .formbold-form-label-2 {
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .formbold-form-input {
            width: 100%;
            padding: 12px 24px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            background: white;
            font-weight: 500;
            font-size: 16px;
            color: #6b7280;
            outline: none;
            resize: none;
        }

        .formbold-form-input:focus {
            border-color: #6a64f1;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-btn {
            text-align: center;
            font-size: 16px;
            border-radius: 6px;
            padding: 14px 32px;
            border: none;
            font-weight: 600;
            background-color: #6a64f1;
            color: white;
            cursor: pointer;
        }

        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold--mx-3 {
            margin-left: -12px;
            margin-right: -12px;
        }

        .formbold-px-3 {
            padding-left: 12px;
            padding-right: 12px;
        }

        .flex {
            display: flex;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .w-full {
            width: 100%;
        }

        .formbold-file-input input {
            opacity: 0;
            width: 100%;
            height: 100%;
        }

        .formbold-file-input label {
            position: relative;
            border: 1px dashed #e0e0e0;
            border-radius: 6px;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
            text-align: center;
        }

        .formbold-drop-file {
            display: block;
            font-weight: 600;
            color: #07074d;
            font-size: 20px;
            margin-bottom: 8px;
        }

        .formbold-or {
            font-weight: 500;
            font-size: 16px;
            color: #6b7280;
            display: block;
            margin-bottom: 8px;
        }

        .formbold-browse {
            font-weight: 500;
            font-size: 16px;
            color: #07074d;
            display: inline-block;
            padding: 8px 28px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
        }

        .formbold-file-list {
            border-radius: 6px;
            background: #f5f7fb;
            padding: 16px 32px;
            margin-top: 20px;
        }

        .formbold-file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .formbold-file-name {
            font-weight: 500;
            font-size: 16px;
            color: #07074d;
            padding-right: 12px;
        }

    </style>
</head>

<body class="antialiased">
        @php $allErrors=''; @endphp
        @if (isset($errors) && count($errors) > 0)
            @foreach ($errors->all() as $error)
                @php $allErrors.=$error @endphp
            @endforeach
            <h1 class="formbold-pt-3 formbold-mb-5" style="color: red;text-align:center">{{ $allErrors }}</h1>
        @endif
        @if(session()->has('message'))
            <h1 class="formbold-pt-3 formbold-mb-5" style="color: green;text-align:center">{{session()->get('message')}}</h1>
        @endif
        <h1 class="formbold-pt-3" style="text-align:center">Welcome To Home</h1>
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                {!! Form::open(['route'=>'upload.file','id' => 'uploadFile', 'enctype' => 'multipart/form-data']) !!}

                    <div class="mb-6 pt-4">
                        <label class="formbold-form-label formbold-form-label-2">
                            Upload File
                        </label>

                        <div class="formbold-mb-5 formbold-file-input">
                            <input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                            <label for="file">
                                <div>
                                    <span class="formbold-drop-file"> Drop files here </span>
                                    <span class="formbold-or"> Or </span>
                                    <span class="formbold-browse"> Browse </span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="formbold-btn w-full">Send File</button>
                    </div>
                {!! Form::close() !!}
                <div class="formbold-file-list formbold-mb-5">
                    <div class="formbold-file-item">
                      <span class="formbold-file-name"> banner-design.png </span>
                    </div>
                </div>
            </div>
            
        </div>
</body>

</html>
