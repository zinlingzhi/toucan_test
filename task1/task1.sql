SELECT e1.emailaddress
FROM emails e1
INNER JOIN emails e2 ON e1.UserRefID = e2.UserRefID AND e1.emailaddress = e2.emailaddress AND e1.emailID <> e2.emailID
INNER JOIN profiles p ON e1.UserRefID = p.UserRefID AND p.Deceased = 0
WHERE e1.Default = 1 OR e2.Default = 1
