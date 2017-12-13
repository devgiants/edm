import { Component, Input, OnInit} from '@angular/core';
import { Document } from "../Interface/document";

@Component({
  selector: 'edm-document-list',
  templateUrl: 'document-list.component.html',
  styles: []
})
export class DocumentsListComponent implements OnInit {

  @Input() documents: Array<Document>;

  constructor() { }

  ngOnInit() {
  }

}
