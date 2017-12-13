import {Component, Input, OnInit} from '@angular/core';
import { Document } from "../Interface/document";

@Component({
  selector: 'edm-document',
  templateUrl: 'document.component.html',
  styles: []
})
export class DocumentComponent implements OnInit {

  @Input() document: Document;

  constructor() { }

  ngOnInit() {

  }

}
