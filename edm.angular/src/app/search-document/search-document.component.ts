import { Component, OnInit } from '@angular/core';
import {DocumentService} from "../Service/document.service";
import {Observable} from "rxjs/Observable";

@Component({
  selector: 'edm-search-document',
  templateUrl: 'search-document.component.html',
  styles: []
})
export class SearchDocumentComponent implements OnInit {

  documents$: Observable<Array<Document>>;

  constructor(private documentService: DocumentService) {
    this.documents$ = this.documentService.getAllDocuments();
  }

  ngOnInit() {
  }

}
