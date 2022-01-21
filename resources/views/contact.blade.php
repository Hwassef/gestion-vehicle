@include('layouts.app')

<div class="container">
    <form action="{{route('user.postLetter')}}" method="post">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <label for="">
                    <h5>Title / Object of your letter: </h5>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="letter_title">
            </div>
        </div>
        <div class="row mt-3">
            <label for="">
                <h5>Letter Body: </h5>
            </label>
        </div>
        <textarea class="form-control" id="summary-ckeditor" name="letter_body"></textarea>
        <button class="btn btn-primary mt-5" type="submit">Post your question</button>
    </form>
</div>





<script>
    CKEDITOR.replace('summary-ckeditor');
</script>
