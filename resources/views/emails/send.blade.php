@extends('layouts.email')

@section('content')
    {!! $body !!}
@endsection

@section('footer')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">
					<font color="grey"><small><center>Automated from vZAU ARTCC issued on the behalf of {{ $sender->full_name }}.</center></small></font>
                  </td>
                </tr>
              </table>
@endsection