curl -X GET "localhost:8080/omeka-collections"

curl -X POST "localhost:8080/omeka-collections" -H 'Content-Type: application/json' -d'
{
  "added": "2021-10-05 11:29:48",
  "featured": 4847,
  "modified": "2021-10-12 06:32:19",
  "owner_id": 3557,
  "public": 2036
}
'

curl -X POST "localhost:8080/omeka-collections/5919" -H 'Content-Type: application/json' -d'
{
  "added": "2021-10-05 11:29:48",
  "featured": 4847,
  "id": 5919,
  "modified": "2021-10-12 06:32:19",
  "owner_id": 3557,
  "public": 2036
}
'

curl -X GET "localhost:8080/omeka-collections/5919"

curl -X DELETE "localhost:8080/omeka-collections/5919"

# --

curl -X GET "localhost:8080/omeka-element-sets"

curl -X POST "localhost:8080/omeka-element-sets" -H 'Content-Type: application/json' -d'
{
  "description": "Mr a red through more usually. Relationship else employee name. Her education economy store thank second none.",
  "name": "likely",
  "record_type": "rock"
}
'

curl -X POST "localhost:8080/omeka-element-sets/2118" -H 'Content-Type: application/json' -d'
{
  "description": "Mr a red through more usually. Relationship else employee name. Her education economy store thank second none.",
  "id": 2118,
  "name": "likely",
  "record_type": "rock"
}
'

curl -X GET "localhost:8080/omeka-element-sets/2118"

curl -X DELETE "localhost:8080/omeka-element-sets/2118"

# --

curl -X GET "localhost:8080/omeka-element-texts"

curl -X POST "localhost:8080/omeka-element-texts" -H 'Content-Type: application/json' -d'
{
  "element_id": 4030,
  "html": 1961,
  "record_id": 6583,
  "record_type": "animal",
  "text": "Reveal democratic me power Democrat."
}
'

curl -X POST "localhost:8080/omeka-element-texts/604" -H 'Content-Type: application/json' -d'
{
  "element_id": 4030,
  "html": 1961,
  "id": 604,
  "record_id": 6583,
  "record_type": "animal",
  "text": "Reveal democratic me power Democrat."
}
'

curl -X GET "localhost:8080/omeka-element-texts/604"

curl -X DELETE "localhost:8080/omeka-element-texts/604"

# --

curl -X GET "localhost:8080/omeka-elements"

curl -X POST "localhost:8080/omeka-elements" -H 'Content-Type: application/json' -d'
{
  "comment": "Policy service but interview sometimes them particularly. Front until gas those admit.",
  "description": "Drug citizen fast machine into beyond but serious. Shoulder might reduce situation. Whole smile pay protect responsibility provide somebody.",
  "element_set_id": 3263,
  "name": "allow",
  "order": 642
}
'

curl -X POST "localhost:8080/omeka-elements/4623" -H 'Content-Type: application/json' -d'
{
  "comment": "Policy service but interview sometimes them particularly. Front until gas those admit.",
  "description": "Drug citizen fast machine into beyond but serious. Shoulder might reduce situation. Whole smile pay protect responsibility provide somebody.",
  "element_set_id": 3263,
  "id": 4623,
  "name": "allow",
  "order": 642
}
'

curl -X GET "localhost:8080/omeka-elements/4623"

curl -X DELETE "localhost:8080/omeka-elements/4623"

# --

curl -X GET "localhost:8080/omeka-files"

curl -X POST "localhost:8080/omeka-files" -H 'Content-Type: application/json' -d'
{
  "added": "2021-09-20 20:54:22",
  "authentication": "three",
  "filename": "Hair blue prove spend interview culture. More after direction college.",
  "has_derivative_image": 2146,
  "item_id": 9104,
  "metadata": "Amount water much civil material. Challenge choice everyone film individual another spring. Thus yard offer billion feeling than.",
  "mime_type": "response",
  "modified": "2021-10-08 03:05:18",
  "order": 7864,
  "original_filename": "Structure side process history government wife. Build agent appear sister. Life role environment appear brother step value.",
  "size": 2573,
  "stored": 2769,
  "type_os": "argue"
}
'

curl -X POST "localhost:8080/omeka-files/4864" -H 'Content-Type: application/json' -d'
{
  "added": "2021-09-20 20:54:22",
  "authentication": "three",
  "filename": "Hair blue prove spend interview culture. More after direction college.",
  "has_derivative_image": 2146,
  "id": 4864,
  "item_id": 9104,
  "metadata": "Amount water much civil material. Challenge choice everyone film individual another spring. Thus yard offer billion feeling than.",
  "mime_type": "response",
  "modified": "2021-10-08 03:05:18",
  "order": 7864,
  "original_filename": "Structure side process history government wife. Build agent appear sister. Life role environment appear brother step value.",
  "size": 2573,
  "stored": 2769,
  "type_os": "argue"
}
'

curl -X GET "localhost:8080/omeka-files/4864"

curl -X DELETE "localhost:8080/omeka-files/4864"

# --

curl -X GET "localhost:8080/omeka-item-types"

curl -X POST "localhost:8080/omeka-item-types" -H 'Content-Type: application/json' -d'
{
  "description": "None specific main conference my western main really. Table Democrat sea unit policy your quickly. Third eye outside least. Throw crime direction whom grow financial billion.",
  "name": "know"
}
'

curl -X POST "localhost:8080/omeka-item-types/9635" -H 'Content-Type: application/json' -d'
{
  "description": "None specific main conference my western main really. Table Democrat sea unit policy your quickly. Third eye outside least. Throw crime direction whom grow financial billion.",
  "id": 9635,
  "name": "know"
}
'

curl -X GET "localhost:8080/omeka-item-types/9635"

curl -X DELETE "localhost:8080/omeka-item-types/9635"

# --

curl -X GET "localhost:8080/omeka-item-types-elements"

curl -X POST "localhost:8080/omeka-item-types-elements" -H 'Content-Type: application/json' -d'
{
  "element_id": 1200,
  "item_type_id": 1989,
  "order": 4791
}
'

curl -X POST "localhost:8080/omeka-item-types-elements/6908" -H 'Content-Type: application/json' -d'
{
  "element_id": 1200,
  "id": 6908,
  "item_type_id": 1989,
  "order": 4791
}
'

curl -X GET "localhost:8080/omeka-item-types-elements/6908"

curl -X DELETE "localhost:8080/omeka-item-types-elements/6908"

# --

curl -X GET "localhost:8080/omeka-items"

curl -X POST "localhost:8080/omeka-items" -H 'Content-Type: application/json' -d'
{
  "added": "2021-10-08 09:33:01",
  "collection_id": 8673,
  "featured": 6803,
  "item_type_id": 1892,
  "modified": "2021-10-12 03:23:59",
  "owner_id": 4232,
  "public": 6315
}
'

curl -X POST "localhost:8080/omeka-items/5654" -H 'Content-Type: application/json' -d'
{
  "added": "2021-10-08 09:33:01",
  "collection_id": 8673,
  "featured": 6803,
  "id": 5654,
  "item_type_id": 1892,
  "modified": "2021-10-12 03:23:59",
  "owner_id": 4232,
  "public": 6315
}
'

curl -X GET "localhost:8080/omeka-items/5654"

curl -X DELETE "localhost:8080/omeka-items/5654"

# --

curl -X GET "localhost:8080/omeka-keys"

curl -X POST "localhost:8080/omeka-keys" -H 'Content-Type: application/json' -d'
{
  "accessed": "2021-09-24 16:41:42",
  "ip": "Former sign most purpose artist figure finally consider.",
  "key": "newspaper",
  "label": "color",
  "user_id": 7173
}
'

curl -X POST "localhost:8080/omeka-keys/3227" -H 'Content-Type: application/json' -d'
{
  "accessed": "2021-09-24 16:41:42",
  "id": 3227,
  "ip": "Former sign most purpose artist figure finally consider.",
  "key": "newspaper",
  "label": "color",
  "user_id": 7173
}
'

curl -X GET "localhost:8080/omeka-keys/3227"

curl -X DELETE "localhost:8080/omeka-keys/3227"

# --

curl -X GET "localhost:8080/omeka-options"

curl -X POST "localhost:8080/omeka-options" -H 'Content-Type: application/json' -d'
{
  "name": "expect",
  "value": "Play what community evening blood still try will. Ability ahead door her affect. Full share air into there."
}
'

curl -X POST "localhost:8080/omeka-options/4483" -H 'Content-Type: application/json' -d'
{
  "id": 4483,
  "name": "expect",
  "value": "Play what community evening blood still try will. Ability ahead door her affect. Full share air into there."
}
'

curl -X GET "localhost:8080/omeka-options/4483"

curl -X DELETE "localhost:8080/omeka-options/4483"

# --

curl -X GET "localhost:8080/omeka-plugins"

curl -X POST "localhost:8080/omeka-plugins" -H 'Content-Type: application/json' -d'
{
  "active": 2786,
  "name": "glass",
  "version": "protect"
}
'

curl -X POST "localhost:8080/omeka-plugins/4228" -H 'Content-Type: application/json' -d'
{
  "active": 2786,
  "id": 4228,
  "name": "glass",
  "version": "protect"
}
'

curl -X GET "localhost:8080/omeka-plugins/4228"

curl -X DELETE "localhost:8080/omeka-plugins/4228"

# --

curl -X GET "localhost:8080/omeka-processes"

curl -X POST "localhost:8080/omeka-processes" -H 'Content-Type: application/json' -d'
{
  "args": "Just laugh home play. Ever officer feel away first assume rate.",
  "class": "dinner",
  "pid": 5427,
  "started": "2021-10-03 12:53:21",
  "status": "Retail buyer",
  "stopped": "2021-10-08 05:53:06",
  "user_id": 901
}
'

curl -X POST "localhost:8080/omeka-processes/1882" -H 'Content-Type: application/json' -d'
{
  "args": "Just laugh home play. Ever officer feel away first assume rate.",
  "class": "dinner",
  "id": 1882,
  "pid": 5427,
  "started": "2021-10-03 12:53:21",
  "status": "Retail buyer",
  "stopped": "2021-10-08 05:53:06",
  "user_id": 901
}
'

curl -X GET "localhost:8080/omeka-processes/1882"

curl -X DELETE "localhost:8080/omeka-processes/1882"

# --

curl -X GET "localhost:8080/omeka-records-tags"

curl -X POST "localhost:8080/omeka-records-tags" -H 'Content-Type: application/json' -d'
{
  "record_id": 6984,
  "record_type": "candidate",
  "tag_id": 777,
  "time": "2021-09-30 17:24:25"
}
'

curl -X POST "localhost:8080/omeka-records-tags/2300" -H 'Content-Type: application/json' -d'
{
  "id": 2300,
  "record_id": 6984,
  "record_type": "candidate",
  "tag_id": 777,
  "time": "2021-09-30 17:24:25"
}
'

curl -X GET "localhost:8080/omeka-records-tags/2300"

curl -X DELETE "localhost:8080/omeka-records-tags/2300"

# --

curl -X GET "localhost:8080/omeka-schema-migrations"

curl -X POST "localhost:8080/omeka-schema-migrations" -H 'Content-Type: application/json' -d'
{
  "version": "head"
}
'

curl -X POST "localhost:8080/omeka-schema-migrations/4071" -H 'Content-Type: application/json' -d'
{
  "id": 4071,
  "version": "head"
}
'

curl -X GET "localhost:8080/omeka-schema-migrations/4071"

curl -X DELETE "localhost:8080/omeka-schema-migrations/4071"

# --

curl -X GET "localhost:8080/omeka-search-texts"

curl -X POST "localhost:8080/omeka-search-texts" -H 'Content-Type: application/json' -d'
{
  "public": 5966,
  "record_id": 6925,
  "record_type": "idea",
  "text": "What conference stay including quite sell within. Century resource admit owner sometimes. Since staff here seat.",
  "title": "Detail traditional fight later significant rather recently. Sort camera sort black nice idea old. Under clear measure upon perhaps."
}
'

curl -X POST "localhost:8080/omeka-search-texts/4967" -H 'Content-Type: application/json' -d'
{
  "id": 4967,
  "public": 5966,
  "record_id": 6925,
  "record_type": "idea",
  "text": "What conference stay including quite sell within. Century resource admit owner sometimes. Since staff here seat.",
  "title": "Detail traditional fight later significant rather recently. Sort camera sort black nice idea old. Under clear measure upon perhaps."
}
'

curl -X GET "localhost:8080/omeka-search-texts/4967"

curl -X DELETE "localhost:8080/omeka-search-texts/4967"

# --

curl -X GET "localhost:8080/omeka-sessions"

curl -X POST "localhost:8080/omeka-sessions" -H 'Content-Type: application/json' -d'
{
  "data": "Life more bit community admit behind perform according.",
  "id": "wish",
  "lifetime": 8817,
  "modified": 7897
}
'

curl -X POST "localhost:8080/omeka-sessions/6113" -H 'Content-Type: application/json' -d'
{
  "data": "Life more bit community admit behind perform according.",
  "id": "wish",
  "lifetime": 8817,
  "modified": 7897,
  "session_id": 6113
}
'

curl -X GET "localhost:8080/omeka-sessions/6113"

curl -X DELETE "localhost:8080/omeka-sessions/6113"

# --

curl -X GET "localhost:8080/omeka-tags"

curl -X POST "localhost:8080/omeka-tags" -H 'Content-Type: application/json' -d'
{
  "name": "today"
}
'

curl -X POST "localhost:8080/omeka-tags/4938" -H 'Content-Type: application/json' -d'
{
  "id": 4938,
  "name": "today"
}
'

curl -X GET "localhost:8080/omeka-tags/4938"

curl -X DELETE "localhost:8080/omeka-tags/4938"

# --

curl -X GET "localhost:8080/omeka-users"

curl -X POST "localhost:8080/omeka-users" -H 'Content-Type: application/json' -d'
{
  "active": 8345,
  "email": "rachel00@example.net",
  "name": "Enter build authority why. Movie wait kind start hold recent she.",
  "password": "physical",
  "role": "agency",
  "salt": "mother",
  "username": "wrong"
}
'

curl -X POST "localhost:8080/omeka-users/4249" -H 'Content-Type: application/json' -d'
{
  "active": 8345,
  "email": "rachel00@example.net",
  "id": 4249,
  "name": "Enter build authority why. Movie wait kind start hold recent she.",
  "password": "physical",
  "role": "agency",
  "salt": "mother",
  "username": "wrong"
}
'

curl -X GET "localhost:8080/omeka-users/4249"

curl -X DELETE "localhost:8080/omeka-users/4249"

# --

curl -X GET "localhost:8080/omeka-users-activations"

curl -X POST "localhost:8080/omeka-users-activations" -H 'Content-Type: application/json' -d'
{
  "added": "2021-10-06 15:39:42",
  "url": "usually",
  "user_id": 339
}
'

curl -X POST "localhost:8080/omeka-users-activations/6728" -H 'Content-Type: application/json' -d'
{
  "added": "2021-10-06 15:39:42",
  "id": 6728,
  "url": "usually",
  "user_id": 339
}
'

curl -X GET "localhost:8080/omeka-users-activations/6728"

curl -X DELETE "localhost:8080/omeka-users-activations/6728"

# --

