

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('changeprofile')}}" method="post">
        @method("POST")
        @csrf
      <div class="modal-body">
        
        	<div class="form-group">
        		<label>Tên hiển thị</label>
        		<input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" readonly value="{{Auth::user()->email}}" class="form-control">
        	</div>
        	                        
          <div class="form-group">
              <label for="password">Mật khẩu mới</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="form-group">
              <label for="password">Xác nhận mật khẩu</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="current-password">
          </div>
        	<div>

			  <input type="checkbox" id="showpass">
			  <label class="form-check-label showpass2"  for="showpass">
			    Hiện mật khẩu
			  </label>
			</div>
        	
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Cập nhật</button>
      </div>
      </form>
    </div>
  </div>
</div>