# Project Case Study - ACF Fields Documentation

## Overview
The Projects section uses **Stratos One parent theme modal** to display case studies with gallery, PDF, and project details.

## Required ACF Fields

Create an ACF Field Group called **"Project Details"** and assign it to the **Project** post type.

### 1. Project Information

**Field Label:** Project URL  
**Field Name:** `project_url`  
**Field Type:** URL  
**Required:** No  
**Description:** External link to the live project

---

**Field Label:** GitHub URL  
**Field Name:** `github_url`  
**Field Type:** URL  
**Required:** No  
**Description:** Link to GitHub repository

---

### 2. Case Study Content

**Field Label:** Problem  
**Field Name:** `case_study_problem`  
**Field Type:** Text Area  
**Rows:** 4  
**Required:** No  
**Description:** Describe the problem or challenge the client faced

---

**Field Label:** Solution  
**Field Name:** `case_study_solution`  
**Field Type:** Text Area  
**Rows:** 4  
**Required:** No  
**Description:** Explain your solution and approach

---

### 3. Results (Repeater)

**Field Label:** Results  
**Field Name:** `case_study_results`  
**Field Type:** Repeater  
**Layout:** Table  
**Required:** No

**Sub-fields:**
- **Value** (`result_value`) - Text - e.g., "95+", "3x", "50%"
- **Label** (`result_label`) - Text - e.g., "Lighthouse Score", "Faster Load", "Cost Reduction"

**Example:**
```
- Value: 95+ | Label: Lighthouse Score
- Value: 3x  | Label: Faster Page Load
- Value: 50% | Label: Reduced Bounce Rate
```

---

### 4. Project Gallery

**Field Label:** Project Gallery  
**Field Name:** `project_gallery`  
**Field Type:** Gallery  
**Required:** No  
**Return Format:** Image Array  
**Description:** Screenshots of the project (used in modal gallery with prev/next navigation)

---

### 5. Documentation

**Field Label:** Case Study PDF  
**Field Name:** `case_study_pdf`  
**Field Type:** File  
**Return Format:** File Array  
**Required:** No  
**Description:** Optional PDF document with detailed case study

---

## Technologies Taxonomy

Create a **Taxonomy** called **"Technologies"**:

**Post Type:** Project  
**Hierarchical:** No (like tags)  
**Show in REST API:** Yes

**Example Terms:**
- .NET
- Angular
- TypeScript
- Docker
- SQL
- Redis
- etc.

---

## Featured Image

Don't forget to set the **Featured Image** for each project - it's used as the project card thumbnail.

---

## Modal Features

The case study modal uses **Stratos One parent theme modal** which provides:

✅ **Gallery Navigation** - Previous/Next arrows for images  
✅ **Keyboard Support** - ESC to close, Arrow keys for gallery  
✅ **Responsive** - Mobile-optimized layout  
✅ **Single Modal** - One modal system for the entire application  
✅ **PDF Support** - Built-in PDF viewer  
✅ **Backdrop Click** - Close on overlay click  

---

## Example JSON Export

You can import this ACF configuration:

```json
{
    "key": "group_project_details",
    "title": "Project Details",
    "fields": [
        {
            "key": "field_project_url",
            "label": "Project URL",
            "name": "project_url",
            "type": "url"
        },
        {
            "key": "field_github_url",
            "label": "GitHub URL",
            "name": "github_url",
            "type": "url"
        },
        {
            "key": "field_case_study_problem",
            "label": "Problem",
            "name": "case_study_problem",
            "type": "textarea"
        },
        {
            "key": "field_case_study_solution",
            "label": "Solution",
            "name": "case_study_solution",
            "type": "textarea"
        },
        {
            "key": "field_case_study_results",
            "label": "Results",
            "name": "case_study_results",
            "type": "repeater",
            "sub_fields": [
                {
                    "key": "field_result_value",
                    "label": "Value",
                    "name": "value",
                    "type": "text"
                },
                {
                    "key": "field_result_label",
                    "label": "Label",
                    "name": "label",
                    "type": "text"
                }
            ]
        },
        {
            "key": "field_project_gallery",
            "label": "Project Gallery",
            "name": "project_gallery",
            "type": "gallery",
            "return_format": "array"
        },
        {
            "key": "field_case_study_pdf",
            "label": "Case Study PDF",
            "name": "case_study_pdf",
            "type": "file",
            "return_format": "array"
        }
    ],
    "location": [
        [
            {
                "param": "post_type",
                "operator": "==",
                "value": "project"
            }
        ]
    ]
}
```

---

## Fallback Behavior

If ACF fields are not filled, the modal will display:
- "Problem description coming soon."
- "Solution details coming soon."
- Empty results section (hidden)
- No gallery button (if no images)
- No PDF download (if no file)

The modal will still open and display:
- Project title
- Excerpt
- Technologies (from taxonomy)
- Links (if provided)
