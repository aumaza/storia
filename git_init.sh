#!/bin/bash

git init
git add *
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/aumaza/storia.git
git push -f origin main
