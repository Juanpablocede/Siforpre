@if(count($errors))
<div class="row w-100">
    <div class="col-12 alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
</div>
@endif
