@props(['id' => 'dropdownMenuButton', 'icon' => 'more-horizontal.svg', 'width' => '15', 'color' => 'light', 'size' => 'sm'])

<div class="dropdown">
    <button class="btn btn-light btn-sm dropdown-toogle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{
            $icon ? asset('icon/' . $icon) : asset('icon/more-vertical.svg')
        }}" alt="More" width="15">
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        {{ $slot }}
    </div>
</div>
