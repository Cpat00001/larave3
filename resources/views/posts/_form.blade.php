<label>Title:</label>
        <input type="text" name="title" value="{{ old('title',$post->title ?? null) }}">
        @error('title')
            <p style="color:red;">{{ $message }}</p>
        @enderror
        <br><br>
        <label>Content:</label>
        <input type="text" name="content" value="{{ old('content', $post->content ?? null) }}">
        @error('content')
            <p style="color:red;">{{ $message }}</p>
        @enderror
        