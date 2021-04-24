# はじめに

# コードサンプル

## スコープ

### var, let, const

| 宣言 | スコープ | 再宣言 | 再代入 | 可変 |
|:-:|:-:|:-:|:-:|:-:|
| var | Function | OK | OK | OK |
| let | Block | NG | OK | OK |
| const | Block | NG | NG | OK |

```js:スコープの確認
function() {
    let hoge = "hoge";
    console.log(hoge); // hoge
    if(true) {
        let hoge = "hogepiyo"
        console.log(hoge); // hogepiyo
    }
    console.log(hoge); // hoge
}
```

## export / import

```html:index.html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>JavaScript - ES8 -</title>
    </head>
    <body>
        <h1>Modern JavaScript</h1>
        <script type="module" src="app.js"></script>
    </body>
</html>
```

```js:users.js
export const users = [
    {id:1, name:'日本 花子', age:22, gender: '女'},
    {id:2, name:'日本 太郎', age:24, gender: '男'},
    {id:3, name:'日本 小太郎', age:2, gender: '男'}
];


export default class User {
    constructor(id, name, age, gender) {
        this.id = id;
        this.name = name;
        this.age = age;
        this.gender = gender;
    }
}
```

```js:app.js
import {users} from './users.js';
console.log(users);

import User from './users.js';
const u1 = new User(1, '日本 次郎', 18, '男');
console.log(u1);
```

## 日付・時間

```javascript:Date
const EXPIRATION_DATE = 1000 * 60 * 60 * 24 * 30;

const today = new Date();
console.log(today);

const limit_time = today.getTime() + EXPIRATION_DATE;
const next_day = new Date(limit_time);
console.log(next_day);
```

## LocalStorage

```html:index.html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./public/css/spectre.min.css">
        <link rel="stylesheet" href="./public/css/spectre-exp.min.css">
        <link rel="stylesheet" href="./public/css/spectre-icons.min.css">
        <title>CraDev</title>
    </head>
    <body>
        <input id="uid" type="text" placeholder="氏名コード(5桁)">
        <button id="login" class="btn" @click="login">Login</button>

        <script src="./public/js/vue.min.js"></script>
        <script type="module" src="./public/js/index.js"></script>
    </body>
</html>
```

```javascript:AutoLogin.js
const EXPIRATION_DATE = 1000 * 60 * 60 * 24 * 30;

export default class {
    constructor() {
        this.loginId = '';
        this.period = '';
        this.today = new Date();
    }

    isRegistered() {
        this.loginId = this.getLoginId();
        this.period = this.getPeriodDate();
        console.log(this.period);

//        if(!this.period) return false;
        if(this.today.getTime() > this.period.getTime()) return false;
        if(!this.loginId) return false;
        return true;
    }

    regist() {
        this.setLoginId('88888');
        this.set.PeriodDate();
    }

    setLoginId(loginId) {
        this.loginId = loginId;
        localStorage.setItem('loginId', this.loginId);
    }

    getLoginId() {
        return localStorage.getItem('loginId');
    }
    
    setPeriodDate() {
        this.period = this.today.getTime() + EXPIRATION_DATE;
        localStorage.setItem('periodDate', this.period);
    }

    getPeriodDate() {
        return localStorage.getItem('periodDate');
    }
}
```

```javascript:index.js
import AutoLogin from './AutoLogin.js';

const staff = new AutoLogin();
console.dir(staff);

if(staff.isRegistered()) {
    console.log('isRegistered: ' + staff.loginId);
    console.log(staff.getPeriodDate().toString());
} else {
    console.log('Welcom!');
    staff.regist();
}
```


## Worker

### サーバサイド
```py:cgi-bin/api.py
import json
from pathlib import *


INPUT_FILE = Path.cwd().joinpath('data\in.json')
OUTPUT_FILE = Path.cwd().joinpath('data\out.json')

def read():
    with open(INPUT_FILE) as f:
        df = json.load(f)
    return df

def write(df):
    with open(OUTPUT_FILE, 'w') as f:
        json.dump(df, f, ensure_ascii=False)

def respons(json_data):
    print('Content-Type: application/json; charset=utf-8\n')
    print(json_data)

df = read()
write(df)
respons(df)
```

```json:data/in.json
{"users": [{"id": 1, "name": "てすと1"}, {"id": 2, "name": "TEST2"}], "regDate": "2019-12-24 10:40:11"}
```

### フロントエンド
```html:index.html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./public/css/spectre.min.css">
        <link rel="stylesheet" href="./public/css/spectre-exp.min.css">
        <link rel="stylesheet" href="./public/css/spectre-icons.min.css">
        <link rel="stylesheet" href="./public/css/index.css">
        <title>Websocket練習用</title>
    </head>
    <body>
        <div id="app">
            <div id="logo" class="container">
                <div class="columns">
                    <div class="column col-12">
                        <figure class="avatar avatar-lg">
                            <img src="public/img/typing_osoi.png" alt="...">
                        </figure>
                        <b class="text-large">Websocket Demo</b>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="columns">
                    <div class="column">
                        <p class="font-big text-center">{{ msg }}</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <input class="col-12" placeholder="message" v-model="msg">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button class="btn btn-success" @click="send">送信</button>
                        <button class="btn btn-error" @click="reset">クリア</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="./public/js/vue.min.js"></script>
        <script src="./public/js/index.js"></script>
    </body>
</html>
```

```javascript:public/js/worker.js
self.addEventListener('message', function(e) {

    self.importScripts('axios.min.js');
    self.axios.get('cgi-bin/api.py', {
        baseURL: 'http://localhost:8000/'
    })
    .then(function(res) {
        console.dir(res);
        self.postMessage(res.data);
    })
    .catch(function(e) {
        console.dir(e);
    })
        
    self.postMessage("@@"+e.data+"@@");
}, false);
```

```javascript:index.js
const app = new Vue({
    el: '#app',
    data: {
        msg: ''
    },
    created: function() {
    },
    methods: {
        send: function() {
            const w = new Worker('public/js/worker.js');

            w.addEventListener('message', function(e) {
                console.log('Message from server ', e.data);
            }, false);

            console.log("Client send to Server: " + this.msg);
            w.postMessage(this.msg);

            this.msg = '';
        },
        reset: function() {
            this.msg = '';
        }
    }
})
```

# [WebAssembly](https://developer.mozilla.org/ja/docs/WebAssembly)

## 概要

## Rust
