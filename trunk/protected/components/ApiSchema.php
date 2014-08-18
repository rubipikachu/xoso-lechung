<?php
/**
 * API JSON Schema - a central point to define Schema of API input data in json format, 
 * http://json-schema.org/
 * @package FshareWeb
 **/
class ApiSchema
{
    private static $_baseSchema = '{ "title": "Fshare API Schema", "type": "object", 
                      "properties": {
                            "token": {
                                "type": "string"
                            },
                            "opts": {
                                "type": "object",
                                "properties": {
                                    "language": {"type": "string", "pattern": "/en|vi/"},
                                    "model": {"type": "string", "pattern": "/dev|pro/"}
                                }
                            }
                        },
                        "required": ["token"]
                    }';
    private static $_filelist = '{
                                 "type": "array",
                                 "items": {
                                    "type": "string",
                                    "pattern": "[a-zA-Z0-9]{6,12}"
                                 },
                                "minItems": 1,
                                "uniqueItems": true
                                }';
    private static $_file = '{
                                 "type": "string",
                                 "pattern": "[a-zA-Z0-9]{1,15}"
                            }';
    private static $_share = '{
                                 "type": "string",
                                 "pattern": "/[A-Z0-9]{12}/"
                            }';
    private static $_emaillist = '{
                                 "type": "array",
                                 "items": {
                                    "type": "string",
                                    "pattern": "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"
                                 },
                                "minItems": 1,
                                "uniqueItems": true
                                }';
    private static $_name = '{
                                 "type": "string",
                                 "pattern": "^(a-z|A-Z|0-9)*[^\\\/:*?<>!,+@#$%^&|\"]{1,100}$"
                            }';
    private static $_nameupload = '{
                                 "type": "string",
                                 "pattern": "^(a-z|A-Z|0-9)*[^\\\/:*?<>,|\"]{1,100}$"
                            }';
                            // ^(?!.*[\/\\|<>"*:?]+).*$
    private static $_linklist = '{
                                 "type": "array",
                                 "items": {
                                    "type": "string",
                                    "pattern": "^[a-zA-Z0-9.;|\-\/"\"]+$"
                                 },
                                "minItems": 1,
                                "uniqueItems": true
                                }';
    private static $_path = '{
                                 "type": "string",
                                 "pattern": "^(a-z|A-Z|0-9)*[^\\:*?<>!@#$%^&|\"]{1,1269}$"
                                }';
    private static $_content = '{
                                 "type": "string",
                                 "pattern": "^([a-zA-Z0-9 ._-áàạảãâấầậẩẫăắằặẳÁÀẠẢÃÂẤẦẬẨẪĂẮẰẶẲéèẹẻẽêếềệểễÉÈẸẺẼÊẾỀỆỂỄóòọỏõôốồộổỗơớờợởÓÒỌỎÕÔỐỒỘỔỖƠỚỜỢỞúùụủũưứừựửữÚÙỤỦŨƯỨỪỰỬỮíìịỉĩÍÌỊỈĨđĐýỳỵỷỹÝỲỴỶỸ()-])*$"
                            }';
    private static $_size = '{
                                 "type": "string",
                                 "pattern": "[0-9]"
                            }';
    private static $_url = '{
                                 "type": "string",
                                 "pattern": "(((https?):\/\/)(www\.)?|www\.)(fshare.rad.fpt+)([a-z\.]{2,7})([\/\w\.-_\?\&]*)*\/?"
                            }';
    public static function schema($name)
    {
        $schema = json_decode(self::$_baseSchema);
        switch ($name) {
            case 'delete':
                $schema->properties->items = json_decode(self::$_filelist);
                array_push($schema->required, 'items');
                break;
            case 'copy':
                $schema->properties->items = json_decode(self::$_filelist);
                $schema->properties->to = json_decode(self::$_file);
                array_push($schema->required, 'items','to');
            case 'move':
                $schema->properties->items = json_decode(self::$_filelist);
                $schema->properties->to = json_decode(self::$_file);
                array_push($schema->required, 'items','to');
                break;
            case 'clone':
                $schema->properties->items = json_decode(self::$_filelist);
                $schema->properties->to = json_decode(self::$_file);
                array_push($schema->required, 'items','to');
                break;
            case 'rename':
                $schema->properties->new_name = json_decode(self::$_name);
                $schema->properties->file = json_decode(self::$_file);
                array_push($schema->required, 'file', 'new_name');
                break;
            case 'createsharelink':
                $schema->properties->items = json_decode(self::$_filelist);
                $schema->properties->emails = json_decode(self::$_emaillist);
                $schema->properties->content = json_decode(self::$_content);
                array_push($schema->required,'items','emails','content');
                break;
            case 'createAndCopyShareLink':
                $schema->properties->items = json_decode(self::$_filelist);
                array_push($schema->required,'items');
                break;
            case 'CreateDirectLink':
                $schema->properties->items = json_decode(self::$_filelist);
                array_push($schema->required, 'items');
                break;
            case 'upload':
                $schema->properties->name = json_decode(self::$_nameupload);
                $schema->properties->size = json_decode(self::$_size);
                $schema->properties->path = json_decode(self::$_path);
                array_push($schema->required,'name','size','path');
                break;
            case 'download':
                $schema->properties->url = json_decode(self::$_url);
                array_push($schema->required,'url');
                break;
             case 'get':
                $schema->properties->url = json_decode(self::$_url);
                array_push($schema->required, 'url');
                break;
            case 'createFolder':
                $schema->properties->in_dir = json_decode(self::$_file);
                $schema->properties->name = json_decode(self::$_name);
                array_push($schema->required, 'name','in_dir');
                break;
            case 'downloadZip':
                $schema->properties->items = json_decode(self::$_linklist);
                array_push($schema->required, 'items');
                break;
            case 'search':
                $schema->properties->keyword = json_decode(self::$_name);
                array_push($schema->required, 'keyword');
                break;
            case 'moveToPath':
                $schema->properties->items = json_decode(self::$_filelist);
                $schema->properties->to = json_decode(self::$_path);
                array_push($schema->required, 'items','to');
                break;
            case 'createFolderInPath':
                $schema->properties->in_dir = json_decode(self::$_path);
                $schema->properties->name = json_decode(self::$_name);
                array_push($schema->required, 'name','in_dir');
                break;
            default: 
                throw new CHttpException(503, Yii::t('fshare', 'Can not find the schema!'));
                
        }
        return $schema;
       
    }
}

?>

