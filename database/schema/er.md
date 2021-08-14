# Entities and Relations

## Entities
|  Entity 	|                                                   Attributes                                                  	|
|:-------:	|:-------------------------------------------------------------------------------------------------------------:	|
| User    	| Name - Password - Status - isAdmin - canConfirm                                                               	|
| File    	| Id - Name - Link - Uploader - isPrivate - UploadDate - NumberOfDownloads - Type - Weight - ExpireDate - Valid 	|
| Request 	| Id - Status                                                                                                   	|
| Guest   	| Id - Name - currentUse                                                                                        	|
| Setting 	| maxFileSize                                                                                                   	|

## Relations
| Relation     	| Entity 1 	| Entity 2 	| Attributes 	|
|--------------	|----------	|----------	|------------	|
| User Upload  	| User     	| File     	| -          	|
| File Request 	| File     	| Request  	| -          	|