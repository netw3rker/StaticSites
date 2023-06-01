# Pantheon Static Site Upstream
This repository facilitates serving sites that are generated from static site generators such as OmniCMS, Cascade, T4, and others.

To use this, create a Pantheon Custom Upstream that uses this repository. Then create a site from that upstream. Finally, upload/export the statically generated site to the /files location of the desired site environment.

Notes:
1) Because the site content is located in the /files folder, the mechanism for deployment will be the "Copy Files From Envrionment" mechanism instead of the Deploy Code option.
2) This does allow light PHP processing. If your static site uses some php code (OmniCMS for example) check any include paths that might exist.
