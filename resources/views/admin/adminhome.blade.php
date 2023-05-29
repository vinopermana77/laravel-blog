<!DOCTYPE html>
<html>

<head>
    @include('admin.admincss')
</head>

<body>
    {{-- Header --}}
    @include('admin.header')
    {{-- Header --}}

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        {{-- Main Body --}}
        @include('admin.body')
        {{-- Main Body --}}

        {{-- Footer --}}
        @include('admin.footer')
        {{-- Footer --}}
    </div>
</body>

</html>