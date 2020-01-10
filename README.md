# simple-php-datastore
Simple data store in PHP.

## Fetch data
* Fetch all data as json object:
  `https://example.com/datastore/?json`
* Fetch variable named `foo`:
  `https://example.com/datastore/?get=foo`
* Fetch time in seconds since variable `foo` was set to timestamp:
  `https://example.com/datastore/?since=foo`

## Setting data
* Set variable `foo` to `bar`:
  `https://example.com/datastore/?set=foo&value=bar`
* Set variable `foo` to my public IP address:
  `https://example.com/datastore/?set=foo&value=IP()`
* Set variable `foo` to my current time:
  `https://example.com/datastore/?set=foo&value=NOW()`
* Unset variable `foo` permanently:
  `https://example.com/datastore/?set=foo`
* Set variables `foo` and `bar` to `something`:
  `https://example.com/datastore/?set[0]=foo&set[1]=bar&value=something`
* Set variable `foo` to `some` and variable `bar` to `thing`:
  `https://example.com/datastore/?set[0]=foo&set[1]=bar&value[0]=some&value[1]=thing`
* Unset both variables `foo` and `bar`:
  `https://example.com/datastore/?set[0]=foo&set[1]=bar`

## Timestamps
* Set `foo` to current time:
  `https://example.com/datastore/?set=foo&value=NOW()`
* Retreive time passed since setting it:
  `https://example.com/datastore/?since=foo`
