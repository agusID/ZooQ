@include('admin.panel_header')
<div class="panel card">
	<table class="table">
		<thead>
            <tr>
                <th colspan="2">Name</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Bio</th>
                @if (Auth::user()->roles->role_name == 'administrator')
                <th align="right">Action</th>
                @endif
            </tr>
		</thead>
		<tbody>
            @foreach($users as $user)
            @if($user->role_id == 2)
            <tr>
                <td width="100px">
                    <img width="100px" class="img-rounded" onmousedown="return false" src="{{ URL::asset('assets/images/avatar/'.$user->data_employee->profile_picture) }}" /><br>
                </td>
                <td>
                    <div><strong>{{ $user->data_employee->name }}</strong></div><div>{{ $user->data_employee->email }}</div>
                </td>
                <td>{{ $user->data_employee->gender }}</td>
                <td>
                    <div><i class="fas fa-phone icon" title="Phone Number"></i> {{ $user->data_employee->phone }}<div>
                    <div><i class="fas fa-map-marker-alt icon" title="Address"></i> {{ $user->data_employee->address }}</div>
                </td>
                <td>{{ $user->data_employee->description }}</td>
                @if (Auth::user()->roles->role_name == 'administrator')
                <td>
                    <form id="delete-form" method="post" action="{{ url('/user/delete/' . $user->user_id) }}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
            
                        <div class="action-group">
                            <button class="btn btn-delete tooltip" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> <span class="tooltiptext">Delete</span></button>  
                        </div>
                    </form>    
                </td>
                @endif
            </tr>
            @endif
            @endforeach
		</tbody>
	</table>
	<div class="boxPagination">
        {{--  {{ $courses->links() }}  --}}
    </div>

</div>
