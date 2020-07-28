        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title',$post->title ?? null) }}">
            @error('title')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>Content:</label>
            <input type="text" name="content" value="{{ old('content', $post->content ?? null) }}">
            @error('content')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>
        
        