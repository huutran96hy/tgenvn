<div style="position: relative;">
    <input type="text" name="{{ $name }}" class="form-control clearable-input" placeholder="{{ $placeholder }}"
        value="{{ old($name, $value ?? '') }}">

    <span class="clear-btn"
        style="display:{{ old($name, $value) ? 'block' : 'none' }};
                position:absolute; right:10px; top:50%;transform:translateY(-50%);cursor:pointer; 
                font-size:18px; color:#aaa;">
        &times;
    </span>
</div>
