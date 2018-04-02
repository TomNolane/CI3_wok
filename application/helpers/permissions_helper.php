<?php
function is_admin()
{
	return CI::$APP->ion_auth->is_admin();
	//return CI::$APP->ion_auth->in_group('admins');
}

function is_member()
{
	return (CI::$APP->ion_auth->in_group('member'));
}

function logged_in()
{
	return (CI::$APP->ion_auth->logged_in());
}
?>