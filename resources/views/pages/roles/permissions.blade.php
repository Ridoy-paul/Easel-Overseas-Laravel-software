@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    
    <div class="block block-rounded">
        <div class="block-content">
            <div class="row">
                <div class="col-md-7">
                    <div class="rounded shadow">
                        <form class="p-3" action="" method="post">
                            @csrf
                                <div class="form-group">
                                    <input type="hidden" name="" value="{{$role->id}}" id="role_ID">
                                    <h3>Permission of {{str_replace(Auth::user()->shop_id."#","", $role->name)}}</h3>
                                    <hr>
                                    @foreach($permissionGroups as $group)
                                    <div class="form-check mb-3">
                                        <label class="form-check-label text-info">{{ $group->group_name }}</label>
                                    </div>
                                    @php
                                    $permissions = App\Models\User::permissionsByGroupNameForAdminHealperRole($group->group_name);
                                    @endphp
                                    <div class="row {{ $group->group_name }} ml-3">
                                        @foreach($permissions as $permission)
                                        <div class="col-md-6 @if($role->hasPermissionTo($permission)) d-none @endif" id="unSelectedPermission_{{$permission->id}}">
                                            <div class="form-check form-check-inline">
                                                <input onclick="checkPermission('{{$group->group_name}}', '{{$permission->id}}', '{{$permission->name}}')" class="form-check-input" type="checkbox" id="permissionCheckbox{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" >
                                                <label class="form-check-label" for="permissionCheckbox{{ $permission->id }}">{{$permission->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    @endforeach
                                    
                                </div>
                            </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="shadow rounded p-2" id="provided_permission_parent">
                    <h3>Provided Permissions</h3><hr>
                        @foreach($permissionGroups as $checked_group)
                        <div id="provided_permission_group_{{$checked_group->group_name}}">
                                <h5 class="text-success"><b>{{$checked_group->group_name}}</b></h5>
                                @php( $exist_permissions = App\Models\User::permissionsByGroupNameForAdminHealperRole($checked_group->group_name) )
                                @foreach($exist_permissions as $checked_permission)
                                @if($role->hasPermissionTo($checked_permission))
                                <div class="form-check form-check-inline ml-4" id="provided_permission_{{$checked_permission->id}}">
                                    <input class="form-check-input" checked onclick="delete_permission({{$checked_permission->id}})" type="checkbox" id="checked_{{$checked_permission->id}}"  value="">
                                    <label class="form-check-label" for="checked_{{$checked_permission->id}}">{{$checked_permission->name}}</label>
                                </div><br \ id="provided_br_{{$checked_permission->id}}">
                                @endif
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Full Table -->

</div>
<!-- END Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $('#permissionCheckboxAll').click(function() {
    if (this.checked) {
      $('input[type=checkbox]').prop('checked', true);
    } else {
      $('input[type=checkbox]').prop('checked', false);
    }
  });
  function checkPermissionByGroup(className, checkThis) {
    const groupIdName = $("#"+checkThis.id);
    const classCheckBox = $('.'+className+' input');
    if (groupIdName.is(':checked')) {
      classCheckBox.prop('checked', true);
    } else {
      classCheckBox.prop('checked', false);
    }
  }


  //Begin:: Check Permission
function checkPermission(group_name, permission_id, permission_name) {
    var unSelectedPermission = document.getElementById("unSelectedPermission_"+permission_id);
    var roleID = $('#role_ID').val();
    $.ajax({
        url: '/admin/set-permission-to-admin-helper-role',
        method:"GET",
        data:{ 
            permission_id:permission_id,
            roleID: roleID,
        },
        success: function (response) {
            
            if(response['status'] == 'yes') {
                unSelectedPermission.classList.add("d-none");
                Toastify({
                    text: response['reason'],
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    className: "success",
                }).showToast();
                $("#provided_permission_group_"+group_name).append('<div class="form-check form-check-inline ml-4" id="provided_permission_'+permission_id+'"><input class="form-check-input" id="checked_'+permission_name+'" checked onclick="delete_permission('+permission_id+')" type="checkbox"  value=""><label class="form-check-label" for="checked_'+permission_name+'">'+permission_name+'</label></div><br / id="provided_br_'+permission_id+'">');
            }
            else {
                Toastify({
                    text: response['reason'],
                    backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                    className: "error",
                }).showToast();
            }
            
        }
    });

}
//End:: Check Permission

//Begin:: Delete Permission
function delete_permission(permission_id) {
    var unSelectedPermission = document.getElementById("unSelectedPermission_"+permission_id);
    var roleID = $('#role_ID').val();
    $.ajax({
        url: '/admin/delete-permission-from-role',
        method:"GET",
        data:{ 
            permission_id:permission_id,
            roleID: roleID,
        },
        success: function (response) {
            if(response['status'] == 'yes') {
                unSelectedPermission.classList.remove("d-none");
                Toastify({
                    text: response['reason'],
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    className: "success",
                }).showToast();
                $("#provided_permission_"+permission_id).remove();
                $("#provided_br_"+permission_id).remove();
                $("#permissionCheckbox"+permission_id).prop("checked", false);
            }
            else {
                Toastify({
                    text: response['reason'],
                    backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                    className: "error",
                }).showToast();
            }
            
        }
    });

}
//End:: Delete Permission

</script>

@endsection
