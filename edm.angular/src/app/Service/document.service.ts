import { Injectable } from '@angular/core';
import { HttpClient} from "@angular/common/http";
import { Observable } from "rxjs/Observable";
import { Document } from "../Interface/document";

const API_URL = 'http://localhost:3000/documents';

@Injectable()
export class DocumentService {

  constructor(private http: HttpClient) { }

  getAllDocuments(): Observable<Array<Document>> {
    return this.http.get<Array<Document>>(API_URL);
  }
}
