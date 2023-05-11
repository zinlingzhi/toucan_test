// Below is an example PHP function. Examine the code then fill in:
// 1. The 9 missing comments in the function to explain the logic/what the code is doing
// 2. The description at the top that explains what the function does
// 3. Describe what each of the return values means

// C/C++
/*
* Add a function description here
* Add a description of the return values here
*/

// Return Values:
// -1: if the given User ID is empty
// 0: if the default email address is invalid.
// 1: if the default email address is valid

private function checkDefaultEmailValid($userId=null)
{
// Check if the given userId is empty.
if(empty($userId)) {
return -1;
}
// Get the default email address for the given user ID
$defaultEmail = $this->getDefaultEmailByUserId($userId);
// if the default email is empty, set it and retrieve it again
if(empty($defaultEmail))
{
$this->set_default_email($userId);
$defaultEmail =

$this->getDefaultEmailByUserId($userId);
}
// if the default email is still empty, return -1
if(empty($defaultEmail))
{
return -1;
}
// if the default email is valid and has been validated within the last 12 months, return 1
if($defaultEmail['valid']>=1 and
($defaultEmail['validated_on'] > (time() - strtotime('-12months'))))
{
return 1;
}
// Retrieve  the email address from the default email array
$email = $defaultEmail['email'];
// If the email address is empty or invalid, return 2
if (empty($email) or !filter_var($email,
FILTER_VALIDATE_EMAIL)) {
return 2;
}
// Check if the email address is valid using an external function.
$validationResults = $this->checkIfValid($email);
// If the email address is invalid, return 0, otherwise, return 1.
if( ! $validationResults ) {
return 0;
} else {
return 1;
}
}