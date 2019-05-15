<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">New User</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <input type="hidden" id="users" value="0"/>
                <form role="form" id="AddUserValidation">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" required="true" id="inputName" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputUser">User Login</label>
                        <input type="text" class="form-control" required="true" id="inputUser" placeholder="Enter your username"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" required="true" id="inputEmail" placeholder="Enter your Email"/>
                    </div>
                    <div class="form-group" id="groupPassword">
                        <label for="inputPassword">Password</label>
                        <input type="password" id="inputPassword" required="true" placeholder="Enter your password" class="form-control"/>
                    </div>
                    <div class="form-group" id="groupRePassword">
                        <label for="inputRePassword" >RePassword</label>
                        <input type="password" id="inputRePassword" required="true" placeholder="Repeat your password"
                         class="form-control" equalTo="#inputPassword"/>
                    </div>
                    <div class="form-group">
						<label>Status</label></br>
                        <label for="inputStatusA">
                        <input type="radio" name="inputStatus" id="active"  />
                        <span class="circle"></span>
                        Aktif
                        </label>
                        <label for="inputStatusB">
                        <input type="radio" name="inputStatus" id="nonactive" />
                        <span class="circle"></span>
                        Non Aktif
                        </label>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Submit</button>
            </div>
        </div>
    </div>
</div>