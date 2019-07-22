@include('admin.panel_header')
<div class="panel">
	<table class="table">
		<thead>
            <tr>
                <th>Social Media</th>
                <th>Link</th>
                @if (Auth::user()->roles->role_name == 'administrator')
                <th align="center">Active</th>
                @endif
            </tr>
		</thead>
		<tbody>
            @foreach($socmeds as $socmed)
            <tr>
                <td>{{ $socmed->name }}</td>
                <td><div class="form-group"> <input type="url" class="form-input disabled" disabled value="{{ $socmed->link }}" /></div></td>
                
                @if (Auth::user()->roles->role_name == 'administrator')
                <td class="w150">
                    <form id="update-form" method="post" action="{{ url('/socmed/update_status/' . $socmed->media_social_id) }}">
                        {{ csrf_field() }}
                        
                        <button class="delete-data btn-default tooltip"> {{ ($socmed->is_active == 1 ? 'ON' : 'OFF') }}<span class="tooltiptext">click for change to {{ ($socmed->is_active == 1 ? 'OFF' : 'ON') }}</span> </button> 
                        <a href="{{ url('socmed/edit/'.$socmed->media_social_id) }}" class="btn-default"><i class="fas fa-edit"></i> Edit</a> 
                    </form>    
                </td>
                @endif
            </tr>
            @endforeach
		</tbody>
	</table>
	<div class="boxPagination">
        {{--  {{ $courses->links() }}  --}}
    </div>

</div>
