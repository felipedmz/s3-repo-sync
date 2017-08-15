# s3-repo-sync

An easy way to sync CDN repositories with Amazon S3 buckets.

### Requires
```json
"require": {
    "aws/aws-sdk-php": "^3.25",
    "monolog/monolog": "^1.22"
}
```

### Usage
Edit the **config.ini** file:


_*upload_enable=1*_ to perform sync

_*sync_directory*_ with slash at the end

_*version=latest*_ by default

```ini
[app]
upload_enabled=0
sync_directory=/foo/bar/YOU_CDN_GIT_REPOSITORY/

[s3]
bucket_name=YOUR_BUCKET_NAME
bucket_user=YOUR_USER
access_key=YOUR_ACCESS_KEY
secret_access_key=YOUR_SECRET_ACCESS_KEY
version=latest
region=YOUR_REGION
```

Run:
```sh
$ php uploader.php
```