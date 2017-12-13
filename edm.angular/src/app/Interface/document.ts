import { ExplicitTag } from "./explicit-tag";

export interface Document {
    id?: Number,
    name: string,
    filePath: string,
    explicitTags: Array<ExplicitTag>
}
