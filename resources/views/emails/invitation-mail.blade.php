@component('mail::message')
<tr>
    <td  style="padding:36px 0 32px 0;vertical-align:top;font-size:15px;font-family:Helvetica,Arial,Verdana;line-height:18px;color:#666666;font-weight:normal;word-wrap:break-word;word-break:normal">
		<p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; margin-top: 0; font-weight: bold; font-size: 20px; line-height: 24px; color: #666666; margin: 0 0 32px 0; padding: 0; text-align: center;">
		Signup Invitation
		</p>

		<p>Hi, {{$details['name']}}</p>
		<p style="box-sizing: border-box; margin-top: 0; text-align: left; font-size: 15px; font-family: Helvetica,Arial,Verdana; line-height: 18px; color: #666666; font-weight: normal; padding: 0; margin: 0; word-wrap: break-word; word-break: normal;">
			You have requested to signup at e-Form. Please click the button bellow to signup.
		</p>
		<br><br>
		<p style="box-sizing: border-box; margin-top: 0; font-size: 15px; font-family: Helvetica,Arial,Verdana; line-height: 18px; color: #666666; font-weight: bold; padding: 0; margin: 0; word-wrap: break-word; word-break: normal; text-align: center;"><br>
			<a  href="{{ route('user.signup',$details['token']) }}" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; text-decoration: none; color: #ffffff; background-color: #00a0dd; padding: 10px 20px;">Please Click to Signup</a>
		</a>	
		<br>
		<br><br>			
		<p>If clicking the button above does not work, type or copy the following link into your browser: </p>
		<p>{{ route('user.signup',$details['token']) }}</p>
		<strong>Thank you</strong>
    </td>
</tr>
@endcomponent
