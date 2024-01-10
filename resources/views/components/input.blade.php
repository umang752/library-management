
<div class="form-group">
    <label for="exampleInputEmail1">{{ $name }}</label>
    <input type="{{ $type }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter {{ $name }}" name="{{ $name }}" value="{{ old($name) }}">
    <span id="emailHelp" class="text-danger">
        @error($name)
            {{ $message }}  
        @enderror
    </span>
</div>
