##member api 

|Function	|	URI			|Method	|	Request				| Response 			|	Code 			|
|-----------|---------------|-------|-----------------------|-------------------|-------------------|
|新增	 	|/members   	|POST	|&lt;member /&gt;…		|void				|200/400			| 
|刪除		|/members/{id}	|DELETE	|void					|void				|200/400/404		|
|修改		|/members/{id}	|PUT	|&lt;member /&gt;…		|void				|200/400/404 		|
|查詢		|/members/{id}	|GET	|void					|&lt;member /&gt;…	|200/400/404		|
|列表		|/members		|GET	|void					|&lt;members /&gt;…	|200/400/404		|

*新增、取得、修改階層資訊
*新增、取得、修改佔成資訊

##DB Schema

主表 `members`

|Field		|	Type	|	Option		|	Allow Null 	|	Default Value 	|	Comment			|
|-----------|-----------|---------------|---------------|-------------------|-------------------|
|uid		|integer	|AUTO_INCREMENT	|				|					|會員的 uid			|
|pid		|integer	|				|V				|Null				|會員上層 uid		|
|username	|string(32)	|UNIQUE			|				|					|會員登入名稱		|
|password	|string(40)	|				|				|					|會員登入密碼(加密)	|
|status		|integer	|				|				|0					|會員狀態			|
|finalLogin	|datetime	|				|				|					|會員最後登入時間	|

副表 `member_profiles`

|Field		|	Type	|	Option	|	Allow Null	|	Default Value	|	Comment		|
|-----------|-----------|-----------|---------------|-------------------|---------------|
|uid		|integer	|			|				|					|會員的 uid		|
|nickname	|string(32)	|			|				|					|會員暱稱		|

副表 `member_credits`

|Field		|	Type	|	Option	|	Allow Null	|	Default Value	|	Comment		|
|-----------|-----------|-----------|---------------|-------------------|---------------|
|uid		|integer	|			|				|					|會員的 uid		|
|credit		|integer	|			|				|					|信用額度		|
