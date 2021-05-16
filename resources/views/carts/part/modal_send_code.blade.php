 <!-- Modal -->
 <div class="modal fade" id="modal-send-code" tabindex="-1" aria-labelledby="modal-send-code-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         @auth
         <div class="form-group p-2 mt-2 mb-2 border">
           <form action="{{ route('cart.send-verify-code') }}" method="POST" id="frm-send-verify-code">
             @csrf
             <p><label for="">Choose Method Send Code</label></p>
             <input type="radio" name="code_type" value="1" id="send-code-type-1" checked><label for="send-code-type-1">Send Code to Mail</label>
             <input type="radio" name="code_type" value="2" id="send-code-type-2"><label for="send-code-type-2">Send Code to Phone</label>
             <button type="submit" class="btn btn-primary">Send Code</button>
           </form>
         </div>
         
         {{-- confirm send code --}}
         <div class="form-group  p-2 mt-2 mb-2 border">
           <form action="{{ route('cart.confirm-verify-code') }}" method="POST" id="frm-confirm-verify-code">
             @csrf
             <div class="form-group">
                <label for="">Code</label>
                <input type="text" name="code" required>
             </div>
             <div class="form-group">
                <button type="submit">Submit</button>
             </div>
          </form>
         </div>
         @endauth
 
         @guest
             <div class="account-info">
                <a href="/login">Login</a>
                <a href="/register">Regitser</a>
             </div>
         @endguest
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>