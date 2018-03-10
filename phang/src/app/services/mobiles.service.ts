
import { Injectable } from '@angular/core';
import {Http, Response, RequestOptions} from '@angular/http';
import 'rxjs/add/operator/map';
import {Observable} from 'rxjs/Observable';
import 'rxjs/Rx';

@Injectable()
export class MobilesService {

    constructor(private _http:Http) { }

  getAllProducts(data){
return this._http.get("https://backendphpjson.herokuapp.com/all.php", data)
//return this._http.get("http://localhost/ciang/php/mobiles/all.php", data)
        .map((response:Response)=>response.json());
  }


}
